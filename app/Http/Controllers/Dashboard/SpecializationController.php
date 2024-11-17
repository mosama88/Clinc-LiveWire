<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SpecializationsRequest;
use App\Http\Requests\Dashboard\SpecializationsUpdateRequest;

class SpecializationController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $other['sections'] = Section::get();
        $data = Specialization::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.settings.specializations.index',compact('data','other'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['sections'] = Section::get();
        return view('dashboard.settings.specializations.create',compact('other'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecializationsRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = Specialization::select('id')->where('com_code',$com_code)->where('name',$request->name)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.specializations.index')->withErrors(['error' => 'عفوآ أسم التخصص  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
           $specialization= new Specialization();
           $specialization['name'] = $request->name;
           $specialization['section_id'] = $request->section_id;
           $specialization['created_by'] = 1;
           $specialization['com_code'] = $com_code;
           $specialization->save();
            DB::commit();
            return redirect()->route('dashboard.specializations.index')->with('success', 'تم أضافة التخصص بنجاح');            
            
        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.specializations.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
        $info = Specialization::findOrFail($id);
        $other['sections'] = Section::get();
        return view('dashboard.settings.specializations.edit',compact('info','other'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpecializationsUpdateRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = Specialization::select('id')->where('com_code',$com_code)->where('name',$request->name)->where('id','!=',$id)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.specializations.index')->withErrors(['error' => 'عفوآ أسم التخصص  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
           $UpdateSpecialization = Specialization::findOrFail($id);
           $UpdateSpecialization['name'] = $request->name;
           $UpdateSpecialization['section_id'] = $request->section_id;
           $UpdateSpecialization['updated_by'] = 1;
           $UpdateSpecialization['com_code'] = $com_code;
           $UpdateSpecialization->save();
            DB::commit();
            return redirect()->route('dashboard.specializations.index')->with('success', 'تم تعديل التخصص بنجاح');            
            
        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.specializations.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
           $DeleteSpecialization = Specialization::findOrFail($id);
           $DeleteSpecialization->delete();
            DB::commit();
            return redirect()->route('dashboard.specializations.index')->with('success', 'تم حذف التخصص بنجاح');            
            
        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.specializations.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }

    }
}