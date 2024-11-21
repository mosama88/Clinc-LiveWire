<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RadiologyServiceRequest;
use App\Models\RadiologyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RadiologyServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = RadiologyService::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->get();
        return view('dashboard.settings.radiologyServices.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.radiologyServices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RadiologyServiceRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = RadiologyService::select('id')->where('com_code',$com_code)->where('name',$request->name)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.radiologyServices.index')->withErrors(['error' => 'عفوآ أسم خدمة الاشعه  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
            $lastRadiology_code =  RadiologyService::where('com_code',$com_code)->orderBy('id','DESC')->value('radiology_code');
            $newRadiology_code =  $lastRadiology_code ? $lastRadiology_code + 1 : 1;
            $insertRadiology = new RadiologyService();
            $insertRadiology['name'] = $request->name;
            $insertRadiology['radiology_code'] = $newRadiology_code;
            $insertRadiology['price'] = $request->price;
            $insertRadiology['notes'] = $request->notes;
            $insertRadiology['status'] = 1;
            $insertRadiology['created_by'] = auth()->user()->id;
            $insertRadiology['com_code'] = $com_code;
            $insertRadiology->save();
            DB::commit();
            return redirect()->route('dashboard.radiologyServices.index')->with('success', 'تم أضافة خدمة الاشعه بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.radiologyServices.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
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
        $info = RadiologyService::findOrFail($id);
        return view('dashboard.settings.radiologyServices.edit',compact('info'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RadiologyServiceRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = RadiologyService::select('id')->where('com_code',$com_code)->where('name',$request->name)->where('id','!=',$id)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.radiologyServices.index')->withErrors(['error' => 'عفوآ أسم خدمة الاشعه  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
            $UpdateRadiology = RadiologyService::findOrFail($id);
            $UpdateRadiology['name'] = $request->name;
            $UpdateRadiology['price'] = $request->price;
            $UpdateRadiology['notes'] = $request->notes;
            $UpdateRadiology['status'] = $request->status;
            $UpdateRadiology['updated_by'] = auth()->user()->id;
            $UpdateRadiology['com_code'] = $com_code;
            $UpdateRadiology->save();
            DB::commit();
            return redirect()->route('dashboard.radiologyServices.index')->with('success', 'تم تعديل خدمة الاشعه بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.radiologyServices.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
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
            $DeleteRadiology = RadiologyService::findOrFail($id);
            $DeleteRadiology->delete();
            DB::commit();
            return redirect()->route('dashboard.radiologyServices.index')->with('success', 'تم حذف خدمة الاشعه بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.radiologyServices.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }

    }
}
