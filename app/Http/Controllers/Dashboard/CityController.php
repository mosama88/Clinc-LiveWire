<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CityRequest;
use App\Http\Requests\Dashboard\UpdateCityRequest;

class CityController extends Controller
{
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $other['governorates'] = Governorate::get();
        $data = City::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.settings.cities.index',compact('data','other'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        return view('dashboard.settings.cities.create',compact('other'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = City::select('id')->where('com_code',$com_code)->where('name',$request->name)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.cities.index')->withErrors(['error' => 'عفوآ أسم المدينه الدم مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
           $city = new City();
           $city['name'] = $request->name;
           $city['governorate_id'] = $request->governorate_id;
           $city['created_by'] = 1;
           $city['com_code'] = $com_code;
           $city->save();
            DB::commit();
            return redirect()->route('dashboard.cities.index')->with('success', 'تم أضافة المدينه بنجاح');            
            
        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.cities.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
        $info = City::findOrFail($id);
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
       return view('dashboard.settings.cities.edit',compact('info','other'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = City::select('id')->where('com_code',$com_code)->where('name',$request->name)->where('id','!=',$id)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.cities.index')->withErrors(['error' => 'عفوآ أسم المدينه الدم مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
           $Updatecity = City::findOrFail($id);
           $Updatecity['name'] = $request->name;           
           $Updatecity['governorate_id'] = $request->governorate_id;
           $Updatecity['updated_by'] = 1;
           $Updatecity['com_code'] = $com_code;
           $Updatecity->save();
            DB::commit();
            return redirect()->route('dashboard.cities.index')->with('success', 'تم تعديل المدينه بنجاح');            
            
        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.cities.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
           $Deletecity = City::findOrFail($id);
           $Deletecity->delete();
            DB::commit();
            return redirect()->route('dashboard.cities.index')->with('success', 'تم حذف المدينه بنجاح');            
            
        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.cities.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }
    }


}