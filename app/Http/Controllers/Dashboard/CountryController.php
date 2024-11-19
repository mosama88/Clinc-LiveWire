<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CountryRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = Country::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->get();
        return view('dashboard.settings.countries.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = Country::select('id')->where('com_code',$com_code)->where('name',$request->name)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.countries.index')->withErrors(['error' => 'عفوآ أسم البلد  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
           $country = new Country();
           $country['name'] = $request->name;
           $country['created_by'] = 1;
           $country['com_code'] = $com_code;
           $country->save();
            DB::commit();
            return redirect()->route('dashboard.countries.index')->with('success', 'تم أضافة الدولة بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.countries.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $info = Country::findOrFail($id);
        return view('dashboard.settings.countries.edit',compact('info'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = Country::select('id')->where('com_code',$com_code)->where('name',$request->name)->where('id','!=',$id)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.countries.index')->withErrors(['error' => 'عفوآ أسم البلد  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
           $UpdateCountry = Country::findOrFail($id);
           $UpdateCountry['name'] = $request->name;
           $UpdateCountry['updated_by'] = 1;
           $UpdateCountry['com_code'] = $com_code;
           $UpdateCountry->save();
            DB::commit();
            return redirect()->route('dashboard.countries.index')->with('success', 'تم تعديل الدولة بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.countries.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $DeleteCountry = Country::findOrFail($id);
           $DeleteCountry->delete();
            DB::commit();
            return redirect()->route('dashboard.countries.index')->with('success', 'تم حذف الدولة بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.countries.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }

    }
}