<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\PatientRequest;
use App\Models\City;
use App\Models\BloodTypes;
use App\Models\Governorate;
use App\Models\Nationality;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $other['nationalities'] = Nationality::get();
        $other['blood_types'] = BloodTypes::get();
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        $other['insurance_companies'] = InsuranceCompany::get();
        $data = Patient::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.patients.index',compact('data','other'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['nationalities'] = Nationality::get();
        $other['blood_types'] = BloodTypes::get();
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        $other['insurance_companies'] = InsuranceCompany::get();
        return view('dashboard.patients.create',compact('other'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = Patient::select('id')->where('com_code',$com_code)->where('national_id',$request->national_id)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.patients.index')->withErrors(['error' => 'عفوآ المريض  مسجل من قبل !!'])->withInput();
            }

            DB::beginTransaction();
            $patient = new Patient();

            $lastPatientCode = Patient::where('com_code',$com_code)->orderBy('id','DESC')->value('patient_code');
            $newPatientCode = $lastPatientCode ? $lastPatientCode +1:1;

            $patient['patient_code'] = $newPatientCode;
            $patient['name'] = $request->name;
            $patient['national_id'] = $request->national_id;
            $patient['mobile'] = $request->mobile;
            $patient['alt_mobile'] = $request->alt_mobile;
            $patient['address'] = $request->address;
            $patient['emergency_contact'] = $request->emergency_contact;
            $patient['email'] = $request->email;
            $patient['date_of_birth'] = $request->date_of_birth;
            $patient['gender'] = $request->gender;
            $patient['insurance_id'] = $request->insurance_id;
            $patient['governorate_id'] = $request->governorate_id;
            $patient['city_id'] = $request->city_id;
            $patient['nationality_id'] = $request->nationality_id;
            $patient['blood_type_id'] = $request->blood_type_id;
            $patient['medical_history'] = $request->medical_history;
            $patient['are_previous_surgeries'] = $request->are_previous_surgeries;
            $patient['previous_surgeries_details'] = $request->previous_surgeries_details;
            $patient['Do_you_take_therapy'] = $request->Do_you_take_therapy;
            $patient['take_therapy_details'] = $request->take_therapy_details;
            $patient['Do_you_chronic_diseases'] = $request->Do_you_chronic_diseases;
            $patient['chronic_diseases_details'] = $request->chronic_diseases_details;
            $patient['notes'] = $request->notes;
            $patient['created_by'] = auth()->user()->id;
            $patient['com_code'] = $com_code;
            $patient->save();
            DB::commit();
            return redirect()->route('dashboard.patients.index')->with('success', 'تم أضافة المريض بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.patients.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getCities(Request $request){
        $com_code = auth()->user()->com_code;
        $governorate = $request->governorate_id;
        $other['cities'] = City::where('com_code',$com_code)->where('governorate_id',$governorate)->get();
        return view('dashboard.patients.getCitites',compact('other'));

    }
}
