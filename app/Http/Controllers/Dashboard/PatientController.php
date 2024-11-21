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
            $insertPatient = new Patient();

            $lastPatientCode = Patient::where('com_code',$com_code)->orderBy('id','DESC')->value('patient_code');
            $newPatientCode = $lastPatientCode ? $lastPatientCode +1:1;

            $insertPatient['patient_code'] = $newPatientCode;
            $insertPatient['name'] = $request->name;
            $insertPatient['national_id'] = $request->national_id;
            $insertPatient['mobile'] = $request->mobile;
            $insertPatient['alt_mobile'] = $request->alt_mobile;
            $insertPatient['address'] = $request->address;
            $insertPatient['emergency_contact'] = $request->emergency_contact;
            $insertPatient['email'] = $request->email;
            $insertPatient['date_of_birth'] = $request->date_of_birth;
            $insertPatient['gender'] = $request->gender;
            $insertPatient['insurance_id'] = $request->insurance_id;
            $insertPatient['governorate_id'] = $request->governorate_id;
            $insertPatient['city_id'] = $request->city_id;
            $insertPatient['nationality_id'] = $request->nationality_id;
            $insertPatient['blood_type_id'] = $request->blood_type_id;
            $insertPatient['medical_history'] = $request->medical_history;
            $insertPatient['are_previous_surgeries'] = $request->are_previous_surgeries;
            $insertPatient['previous_surgeries_details'] = $request->previous_surgeries_details;
            $insertPatient['Do_you_take_therapy'] = $request->Do_you_take_therapy;
            $insertPatient['take_therapy_details'] = $request->take_therapy_details;
            $insertPatient['Do_you_chronic_diseases'] = $request->Do_you_chronic_diseases;
            $insertPatient['chronic_diseases_details'] = $request->chronic_diseases_details;
            $insertPatient['notes'] = $request->notes;
            $insertPatient['created_by'] = auth()->user()->id;
            $insertPatient['com_code'] = $com_code;
            $insertPatient->save();
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
        $info = Patient::findOrFail($id);
        $other['nationalities'] = Nationality::get();
        $other['blood_types'] = BloodTypes::get();
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        $other['insurance_companies'] = InsuranceCompany::get();
        return view('dashboard.patients.show',compact('other','info'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $info = Patient::findOrFail($id);
        $other['nationalities'] = Nationality::get();
        $other['blood_types'] = BloodTypes::get();
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        $other['insurance_companies'] = InsuranceCompany::get();
        return view('dashboard.patients.edit',compact('other','info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = Patient::select('id')->where('com_code',$com_code)->where('national_id',$request->national_id)->where('id','!=',$id,)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.patients.index')->withErrors(['error' => 'عفوآ المريض  مسجل من قبل !!'])->withInput();
            }

            DB::beginTransaction();
            $updatePatient = new Patient();

            $lastPatientCode = Patient::where('com_code',$com_code)->orderBy('id','DESC')->value('patient_code');
            $newPatientCode = $lastPatientCode ? $lastPatientCode +1:1;

            $updatePatient['patient_code'] = $newPatientCode;
            $updatePatient['name'] = $request->name;
            $updatePatient['national_id'] = $request->national_id;
            $updatePatient['mobile'] = $request->mobile;
            $updatePatient['alt_mobile'] = $request->alt_mobile;
            $updatePatient['address'] = $request->address;
            $updatePatient['emergency_contact'] = $request->emergency_contact;
            $updatePatient['email'] = $request->email;
            $updatePatient['date_of_birth'] = $request->date_of_birth;
            $updatePatient['gender'] = $request->gender;
            $updatePatient['insurance_id'] = $request->insurance_id;
            $updatePatient['governorate_id'] = $request->governorate_id;
            $updatePatient['city_id'] = $request->city_id;
            $updatePatient['nationality_id'] = $request->nationality_id;
            $updatePatient['blood_type_id'] = $request->blood_type_id;
            $updatePatient['medical_history'] = $request->medical_history;
            $updatePatient['are_previous_surgeries'] = $request->are_previous_surgeries;
            $updatePatient['previous_surgeries_details'] = $request->previous_surgeries_details;
            $updatePatient['Do_you_take_therapy'] = $request->Do_you_take_therapy;
            $updatePatient['take_therapy_details'] = $request->take_therapy_details;
            $updatePatient['Do_you_chronic_diseases'] = $request->Do_you_chronic_diseases;
            $updatePatient['chronic_diseases_details'] = $request->chronic_diseases_details;
            $updatePatient['notes'] = $request->notes;
            $updatePatient['created_by'] = auth()->user()->id;
            $updatePatient['com_code'] = $com_code;
            $updatePatient->save();
            DB::commit();
            return redirect()->route('dashboard.patients.index')->with('success', 'تم تعديل المريض بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.patients.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
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
            $DeletePatient = Patient::findOrFail($id);
            $DeletePatient->delete();
            DB::commit();
            return redirect()->route('dashboard.patients.index')->with('success', 'تم حذف المريض بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.patients.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }

    }

    public function getCities(Request $request){
        $com_code = auth()->user()->com_code;
        $governorate = $request->governorate_id;
        $other['cities'] = City::where('com_code',$com_code)->where('governorate_id',$governorate)->get();
        return view('dashboard.patients.getCitites',compact('other'));

    }
}
