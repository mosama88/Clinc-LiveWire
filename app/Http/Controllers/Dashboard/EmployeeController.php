<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\EmployeeRequest;
use App\Models\City;
use App\Models\Branch;
use App\Models\Section;
use App\Models\Employee;
use App\Models\JobGrade;
use App\Models\ShiftType;
use App\Models\BloodTypes;
use App\Models\Department;
use App\Models\Governorate;
use App\Models\JobCategory;
use App\Models\Nationality;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    use UploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
     
        $data = Employee::select("id","employee_code","name","job_category_id","governorate_id","department_id","created_by","updated_by","branch_id","email")
        ->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.employees.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['nationalities'] = Nationality::get();
        $other['sections'] = Section::get();
        $other['blood_types'] = BloodTypes::get();
        $other['branches'] = Branch::get();
        $other['departments'] = Department::get();
        $other['governorates'] = Governorate::get();
        $other['job_categories'] = JobCategory::get();
        $other['qualifications'] = Qualification::get();
        $other['shift_types'] = ShiftType::get();
        $other['cities'] = City::get();
        $other['job_grades'] = JobGrade::get();
        return view('dashboard.employees.create',compact('other'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();

            $checkExistsnational_id = Employee::select("id")->where('com_code',$com_code)->where('national_id',$request->national_id)->first();
            if($checkExistsnational_id){
                return redirect()->route('dashboard.employees.index')->withErrors(['error' => 'عفوآ الموظف  مسجل من قبل !!'])->withInput();
            }

            
            $insertEmployee = new Employee();

            $lastEmployeeCode = Employee::where('com_code', $com_code)->orderBy('employee_code','DESC')->value('employee_code');
            $newEmployeeCode = $lastEmployeeCode ? $lastEmployeeCode +1 : 1;

            $insertEmployee['employee_code'] = $newEmployeeCode;
            $insertEmployee['name'] = $request->name;
            $insertEmployee['email'] = $request->email;
            $insertEmployee['brith_date'] = $request->brith_date;
            $insertEmployee['gender'] = $request->gender;
            $insertEmployee['religion'] = $request->religion;
            $insertEmployee['nationality_id'] = $request->nationality_id;
            $insertEmployee['governorate_id'] = $request->governorate_id;
            $insertEmployee['city_id'] = $request->city_id;
            $insertEmployee['address'] = $request->address;
            $insertEmployee['home_telephone'] = $request->home_telephone;
            $insertEmployee['mobile'] = $request->mobile;
            $insertEmployee['social_status'] = $request->social_status;
            $insertEmployee['children_number'] = $request->children_number;
            $insertEmployee['blood_types_id'] = $request->blood_types_id;
            $insertEmployee['branch_id'] = $request->branch_id;
            $insertEmployee['qualification_id'] = $request->qualification_id;
            $insertEmployee['qualification_year'] = $request->qualification_year;
            $insertEmployee['major'] = $request->major;
            $insertEmployee['graduation_estimate'] = $request->graduation_estimate;
            $insertEmployee['university'] = $request->university;
            $insertEmployee['national_id'] = $request->national_id;
            $insertEmployee['military'] = $request->military;
            $insertEmployee['military_date_from'] = $request->military_date_from;
            $insertEmployee['military_date_to'] = $request->military_date_to;
            $insertEmployee['military_wepon'] = $request->military_wepon;
            $insertEmployee['military_exemption_date'] = $request->military_exemption_date;
            $insertEmployee['military_exemption_reason'] = $request->military_exemption_reason;
            $insertEmployee['military_postponement_date'] = $request->military_postponement_date;
            $insertEmployee['military_postponement_reason'] = $request->military_postponement_reason;
            $insertEmployee['driving_license'] = $request->driving_license;
            $insertEmployee['driving_license_type'] = $request->driving_license_type;
            $insertEmployee['driving_License_id'] = $request->driving_License_id;
            $insertEmployee['has_relatives'] = $request->has_relatives;
            $insertEmployee['relatives_details'] = $request->relatives_details;
            $insertEmployee['work_start_date'] = $request->work_start_date;
            $insertEmployee['functional_status'] = $request->functional_status;
            $insertEmployee['department_id'] = $request->department_id;
            $insertEmployee['job_grade_id'] = $request->job_grade_id;
            $insertEmployee['job_category_id'] = $request->job_category_id;
            $insertEmployee['has_fixed_shift'] = $request->has_fixed_shift;
            $insertEmployee['shift_type_id'] = $request->shift_type_id;
            $insertEmployee['daily_work_hour'] = $request->daily_work_hour;
            $insertEmployee['salary'] = $request->salary;
            $insertEmployee['day_price'] = abs($request->salary / 30);
            $insertEmployee['motivation_type'] = $request->motivation_type;
            $insertEmployee['motivation_value'] = $request->motivation_value;
            $insertEmployee['fixed_allowances'] = $request->fixed_allowances;
            $insertEmployee['social_insurance'] = $request->social_insurance;
            $insertEmployee['social_insurance_cut_monthely'] = $request->social_insurance_cut_monthely;
            $insertEmployee['social_insurance_number'] = $request->social_insurance_number;
            $insertEmployee['medical_insurance'] = $request->medical_insurance;
            $insertEmployee['medical_insurance_cut_monthely'] = $request->medical_insurance_cut_monthely;
            $insertEmployee['medical_insurance_number'] = $request->medical_insurance_number;
            $insertEmployee['Type_salary_receipt'] = $request->Type_salary_receipt;
            $insertEmployee['notes'] = $request->notes;
            $insertEmployee['bank_number_account'] = $request->bank_number_account;
            $insertEmployee['urgent_person_details'] = $request->urgent_person_details;
            $insertEmployee['created_by'] = auth()->user()->id;
            $insertEmployee['com_code'] = $com_code;
            $insertEmployee->save();

            $this->verifyAndStoreFile($request, 'photo', 'Employee/photo/', 'upload_image', $insertEmployee->id, 'App\Models\Employee');





            DB::commit();
            return redirect()->route('dashboard.employees.index')->with('success', 'تم أضافة بيانات ' . $request->name . ' بنجاح ');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.employees.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Employee::findOrFail($id);
        $other['nationalities'] = Nationality::get();
        $other['sections'] = Section::get();
        $other['blood_types'] = BloodTypes::get();
        $other['branches'] = Branch::get();
        $other['departments'] = Department::get();
        $other['governorates'] = Governorate::get();
        $other['job_categories'] = JobCategory::get();
        $other['qualifications'] = Qualification::get();
        $other['shift_types'] = ShiftType::get();
        $other['cities'] = City::get();
        $other['job_grades'] = JobGrade::get();
        return view('dashboard.employees.show',compact('data','other'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $data = Employee::findOrFail($id);
        $other['nationalities'] = Nationality::get();
        $other['sections'] = Section::get();
        $other['blood_types'] = BloodTypes::get();
        $other['branches'] = Branch::get();
        $other['departments'] = Department::get();
        $other['governorates'] = Governorate::get();
        $other['job_categories'] = JobCategory::get();
        $other['qualifications'] = Qualification::get();
        $other['shift_types'] = ShiftType::get();
        $other['cities'] = City::get();
        $other['job_grades'] = JobGrade::get();
        return view('dashboard.employees.edit',compact('data','other'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();

            $checkExistsnational_id = Employee::select("id")->where('com_code',$com_code)->where('national_id',$request->national_id)->where('id','!=',$id)->first();
            if($checkExistsnational_id){
                return redirect()->route('dashboard.employees.index')->withErrors(['error' => 'عفوآ الموظف  مسجل من قبل  !!'])->withInput();
            }


            
            $updateEmployee = Employee::findOrFail($id);

            $updateEmployee['name'] = $request->name;
            $updateEmployee['email'] = $request->email;
            $updateEmployee['brith_date'] = $request->brith_date;
            $updateEmployee['gender'] = $request->gender;
            $updateEmployee['religion'] = $request->religion;
            $updateEmployee['nationality_id'] = $request->nationality_id;
            $updateEmployee['governorate_id'] = $request->governorate_id;
            $updateEmployee['city_id'] = $request->city_id;
            $updateEmployee['address'] = $request->address;
            $updateEmployee['home_telephone'] = $request->home_telephone;
            $updateEmployee['mobile'] = $request->mobile;
            $updateEmployee['social_status'] = $request->social_status;
            $updateEmployee['children_number'] = $request->children_number;
            $updateEmployee['blood_types_id'] = $request->blood_types_id;
            $updateEmployee['branch_id'] = $request->branch_id;
            $updateEmployee['qualification_id'] = $request->qualification_id;
            $updateEmployee['qualification_year'] = $request->qualification_year;
            $updateEmployee['major'] = $request->major;
            $updateEmployee['graduation_estimate'] = $request->graduation_estimate;
            $updateEmployee['university'] = $request->university;
            $updateEmployee['national_id'] = $request->national_id;
            $updateEmployee['military'] = $request->military;
            $updateEmployee['military_date_from'] = $request->military_date_from;
            $updateEmployee['military_date_to'] = $request->military_date_to;
            $updateEmployee['military_wepon'] = $request->military_wepon;
            $updateEmployee['military_exemption_date'] = $request->military_exemption_date;
            $updateEmployee['military_exemption_reason'] = $request->military_exemption_reason;
            $updateEmployee['military_postponement_date'] = $request->military_postponement_date;
            $updateEmployee['military_postponement_reason'] = $request->military_postponement_reason;
            $updateEmployee['driving_license'] = $request->driving_license;
            $updateEmployee['driving_license_type'] = $request->driving_license_type;
            $updateEmployee['driving_License_id'] = $request->driving_License_id;
            $updateEmployee['has_relatives'] = $request->has_relatives;
            $updateEmployee['relatives_details'] = $request->relatives_details;
            $updateEmployee['work_start_date'] = $request->work_start_date;
            $updateEmployee['functional_status'] = $request->functional_status;
            $updateEmployee['department_id'] = $request->department_id;
            $updateEmployee['job_grade_id'] = $request->job_grade_id;
            $updateEmployee['job_category_id'] = $request->job_category_id;
            $updateEmployee['has_fixed_shift'] = $request->has_fixed_shift;
            $updateEmployee['shift_type_id'] = $request->shift_type_id;
            $updateEmployee['daily_work_hour'] = $request->daily_work_hour;
            $updateEmployee['salary'] = $request->salary;
            $updateEmployee['day_price'] = $request->day_price;
            $updateEmployee['motivation_type'] = $request->motivation_type;
            $updateEmployee['motivation_value'] = $request->motivation_value;
            $updateEmployee['fixed_allowances'] = $request->fixed_allowances;
            $updateEmployee['social_insurance'] = $request->social_insurance;
            $updateEmployee['social_insurance_cut_monthely'] = $request->social_insurance_cut_monthely;
            $updateEmployee['social_insurance_number'] = $request->social_insurance_number;
            $updateEmployee['medical_insurance'] = $request->medical_insurance;
            $updateEmployee['medical_insurance_cut_monthely'] = $request->medical_insurance_cut_monthely;
            $updateEmployee['medical_insurance_number'] = $request->medical_insurance_number;
            $updateEmployee['Type_salary_receipt'] = $request->Type_salary_receipt;
            $updateEmployee['notes'] = $request->notes;
            $updateEmployee['bank_number_account'] = $request->bank_number_account;
            $updateEmployee['urgent_person_details'] = $request->urgent_person_details;
            $updateEmployee['created_by'] = auth()->user()->id;
            $updateEmployee['com_code'] = $com_code;
            $updateEmployee->save();


            // Check if there's a new photo to upload
            if ($request->hasFile('photo')) {
                // Delete the old image file if it exists
                if ($updateEmployee->image) {
                    $old_img = $updateEmployee->image->filename;
                    $this->Delete_attachment('upload_image', 'Employee/photo/' . $old_img, $updateEmployee->id);
                    $updateEmployee->image()->delete(); // Remove the old image record from the database
                }

                // Upload the new image and save it in the database
                $this->verifyAndStoreFile($request, 'photo', 'Employee/photo/', 'upload_image', $updateEmployee->id, 'App\Models\Employee');
            }



            DB::commit();
            return redirect()->route('dashboard.employees.index')->with('success', 'تم تعديل بيانات ' . $request->name . ' بنجاح ');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.employees.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Request $request,$id)
    {
        try {
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
        $deleteEmployee = Employee::findOrFail($id);
        $deleteEmployee->delete()->where('com_code',$com_code);

        if ($request->page_id == 1) {
            // التحقق من وجود صورة
            if ($deleteEmployee->image) {
                $filename = $deleteEmployee->image->filename;
                $path = 'Employee/photo/' . $filename;

                // حذف الصورة
                $this->Delete_attachment('upload_image', $path, $deleteEmployee->image->id);
            }
        }
        DB::commit();
        return redirect()->route('dashboard.employees.index')->with('success', 'تم حذف البيانات بنجاح ' );
  
    } catch (\Exception  $ex) {
        DB::rollback();
        return redirect()->route('dashboard.employees.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
    }
}


public function getCities(Request $request){
        if($request->ajax()){
            $governorate =$request->governorate_id;
            $other['cities']=City::where('governorate_id',$governorate)->get();
            return view('dashboard.employees.getCitites',compact('other'));
        }
}

}