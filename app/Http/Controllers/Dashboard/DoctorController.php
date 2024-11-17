<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Doctor;
use App\Models\Section;
use App\Models\Governorate;
use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DoctorRequest;

class DoctorController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = Doctor::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.doctors.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['nationalities'] = Nationality::get();
        $other['sections'] = Section::get();
        $other['specializations'] = Specialization::get();
        return view('dashboard.doctors.create',compact('other'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $doctor = new Doctor();
           $doctor['name'] = $request->name;
           $doctor['id_number'] = $request->id_number;
           $doctor['mobile'] = $request->mobile;
           $doctor['address'] = $request->address;
           $doctor['title'] = $request->title;
           $doctor['email'] = $request->email;
           $doctor['gender'] = $request->gender;
           $doctor['nationality_id'] = $request->nationality_id;
           $doctor['specialization_id'] = $request->specialization_id;
           $doctor['section_id'] = $request->section_id;
           $doctor['status'] = 1;
           $doctor['created_by'] = 1;
           $doctor['com_code'] = $com_code;
           $doctor->save();
            DB::commit();
            return redirect()->route('dashboard.doctors.index')->with('success', 'تم أضافة الطبيب بنجاح');            
            
        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.doctors.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
        $info = Doctor::findOrFail($id);
        $other['nationalities'] = Nationality::get();
        $other['sections'] = Section::get();
        $other['specializations'] = Specialization::get();
        return view('dashboard.doctors.edit',compact('info','other'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $UpdateDoctor = Doctor::findOrFail($id);
           $UpdateDoctor['name'] = $request->name;
           $UpdateDoctor['address'] = $request->address;
           $UpdateDoctor['phone'] = $request->phone;
           $UpdateDoctor['email'] = $request->email ;
           $UpdateDoctor['governorate_id'] = $request->governorate_id;
           $UpdateDoctor['city_id'] = $request->city_id;
           $UpdateDoctor['status'] = $request->status;
           $UpdateDoctor['updated_by'] = 1;
           $UpdateDoctor['com_code'] = $com_code;
           $UpdateDoctor->save();
            DB::commit();
            return redirect()->route('dashboard.doctors.index')->with('success', 'تم تعديل الطبيب بنجاح');            
            
        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.doctors.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
           $DeleteDoctor = Doctor::findOrFail($id);
           $DeleteDoctor->delete();
            DB::commit();
            return redirect()->route('dashboard.doctors.index')->with('success', 'تم حذف الطبيب بنجاح');            
            
        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.doctors.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }
    }

    public function getCities(Request $request)
{
    if ($request->ajax()) {
        $governorate_id = $request->governorate_id;
        $other['cities'] = City::where('governorate_id', $governorate_id)->get();
        return view('dashboard.doctors.getCitites',compact('other'));
    }
}






    
}