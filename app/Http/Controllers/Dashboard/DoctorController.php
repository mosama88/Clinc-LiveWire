<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Appointment;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Section;
use App\Models\Governorate;
use App\Models\Nationality;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DoctorRequest;

class DoctorController extends Controller
{


    use UploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $other['sections'] = Section::all();
        $other['specializations'] = Specialization::all();
        $data = Doctor::select("*")->where('com_code', $com_code)->orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.doctors.index', compact('data', 'other'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['nationalities'] = Nationality::get();
        $other['sections'] = Section::get();
        $other['specializations'] = Specialization::get();
        return view('dashboard.doctors.create', compact('other'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();

            $checkExistsNationalID = Doctor::select('id')->where('com_code', $com_code)->where('national_id', $request->national_id)->first();
            if (!empty($checkExistsNationalID)) {
                return redirect()->route('dashboard.doctors.index')->withErrors(['error' => 'عفوآ الدكتور مسجل  من قبل !!'])->withInput();
            }
            $insertDoctor = new Doctor();
            $last_doctor = Doctor::where('com_code', $com_code)->orderBy('id', 'DESC')->value('doctor_code');
            //    condition ? value_if_true : value_if_false;
            $newDoctorCode =  $last_doctor ? $last_doctor + 1 : 1;
            $insertDoctor['doctor_code'] = $newDoctorCode;
            $insertDoctor['name'] = $request->name;
            $insertDoctor['national_id'] = $request->national_id;
            $insertDoctor['mobile'] = $request->mobile;
            $insertDoctor['address'] = $request->address;
            $insertDoctor['title'] = $request->title;
            $insertDoctor['details'] = $request->details;
            $insertDoctor['email'] = $request->email;
            $insertDoctor['gender'] = $request->gender;
            $insertDoctor['nationality_id'] = $request->nationality_id;
            $insertDoctor['specialization_id'] = $request->specialization_id;
            $insertDoctor['section_id'] = $request->section_id;
            $insertDoctor['status'] = 1;
            $insertDoctor['created_by'] =auth()->user()->id;
            $insertDoctor['com_code'] = $com_code;
            $insertDoctor->save();

            $this->verifyAndStoreFile($request, 'photo', 'Doctor/photo/', 'upload_image', $insertDoctor->id, 'App\Models\Doctor');


            DB::commit();
            return redirect()->route('dashboard.doctors.index')->with('success', 'تم أضافة الطبيب بنجاح');
        } catch (\Exception  $ex) {
            DB::rollback();
            return redirect()->route('dashboard.doctors.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Doctor::findOrFail($id);
        $other['nationalities'] = Nationality::get();
        $other['sections'] = Section::get();
        $other['specializations'] = Specialization::get();
        return view('dashboard.doctors.show', compact('data', 'other'));
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
        return view('dashboard.doctors.edit', compact('info', 'other'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request, string $id)
    {
        try {
            $com_code = auth()->user()->com_code;
            $checkExistsNationalID = Doctor::select('id')->where('com_code', $com_code)->where('national_id', $request->national_id)->where('id',"!=",$id)->first();
            if (!empty($checkExistsNationalID)) {
                return redirect()->route('dashboard.doctors.index')->withErrors(['error' => 'عفوآ الدكتور مسجل  من قبل !!'])->withInput();
            }
            DB::beginTransaction();
            $UpdateDoctor = Doctor::findOrFail($id);
            $UpdateDoctor['name'] = $request->name;
            $UpdateDoctor['national_id'] = $request->national_id;
            $UpdateDoctor['mobile'] = $request->mobile;
            $UpdateDoctor['address'] = $request->address;
            $UpdateDoctor['title'] = $request->title;
            $UpdateDoctor['details'] = $request->details;
            $UpdateDoctor['email'] = $request->email;
            $UpdateDoctor['gender'] = $request->gender;
            $UpdateDoctor['nationality_id'] = $request->nationality_id;
            $UpdateDoctor['specialization_id'] = $request->specialization_id;
            $UpdateDoctor['section_id'] = $request->section_id;
            $UpdateDoctor['status'] = $request->status;
            $UpdateDoctor['updated_by'] = auth()->user()->id;
            $UpdateDoctor['com_code'] = $com_code;
            $UpdateDoctor->save();

            // Check if there's a new photo to upload
            if ($request->hasFile('photo')) {
                // Delete the old image file if it exists
                if ($UpdateDoctor->image) {
                    $old_img = $UpdateDoctor->image->filename;
                    $this->Delete_attachment('upload_image', 'Doctor/photo/' . $old_img, $UpdateDoctor->id);
                    $UpdateDoctor->image()->delete(); // Remove the old image record from the database
                }

                // Upload the new image and save it in the database
                $this->verifyAndStoreFile($request, 'photo', 'Doctor/photo/', 'upload_image', $UpdateDoctor->id, 'App\Models\Doctor');
            }
            DB::commit();
            return redirect()->route('dashboard.doctors.index')->with('success', 'تم تعديل الطبيب بنجاح');
        } catch (\Exception  $ex) {
            DB::rollback();
            return redirect()->route('dashboard.doctors.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            $com_code = auth()->user()->com_code;
            $DeleteDoctor = Doctor::where('com_code',$com_code)->findOrFail($id);
            $DoctorAppointment = $DeleteDoctor->doctorappointments()->where('doctor_id',$id)->first();
            if (!empty($DoctorAppointment)) {
                return redirect()->route('dashboard.doctors.index')->withErrors(['error' => 'لا يمكن حذف الطبيب لأنه مرتبط بمواعيد. برجاء حذف المواعيد أولاً. !!'])->withInput();
            }

            $DeleteDoctor->delete();

        if ($request->page_id == 1) {
            // التحقق من وجود صورة
            if ($DeleteDoctor->image) {
                $filename = $DeleteDoctor->image->filename;
                $path = 'Doctor/photo/' . $filename;

                // حذف الصورة
                $this->Delete_attachment('upload_image', $path, $DeleteDoctor->image->id);
            }
        }
        DB::commit();
        return redirect()->route('dashboard.doctors.index')->with('success', 'تم حذف البيانات بنجاح ' );
  
    } catch (\Exception  $ex) {
        DB::rollback();
        return redirect()->route('dashboard.doctors.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
    }
}


    public function getSpecializations(Request $request)
    {
        if ($request->ajax()) {
            $section_id = $request->section_id; // استلام التخصص المحدد
            $other['specializations'] = Specialization::where('section_id', $section_id)->get(); // استعلام عن الأقسام

            return view('dashboard.doctors.getSpecializations', compact('other'));
        }
    }


    public function appointmentIndex()
    {

        $com_code = auth()->user()->com_code;
        $other['sections'] = Section::all();
        $other['specializations'] = Specialization::all();
        $data = Doctor::select("*")->where('com_code', $com_code)->orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.doctors.appointments.appintmentIndex', compact('data', 'other'));
    }


    public function appintmentsEdit(Request $request, $id)
    {
        $other['sections'] = Section::all();
        $other['specializations'] = Specialization::all();
        $other['appointments'] = Appointment::all();
        $appintmentEdit = Doctor::findOrFail($id);
        return view('dashboard.doctors.appointments.appintmentEdit', compact('appintmentEdit', 'other'));
    }



    public function updateAppintment(Request $request, string $id)
    {
        try {
            DB::beginTransaction();
            $UpdateDoctor = Doctor::findOrFail($id);
            $UpdateDoctor['updated_by'] = 1;
            $UpdateDoctor['viseta_price'] = $request->viseta_price;
            $UpdateDoctor->doctorappointments()->sync($request->appointments);
            $UpdateDoctor->save();
            DB::commit();
            return redirect()->route('dashboard.doctors.appointmentIndex')->with('success', 'تم تعديل الطبيب بنجاح');
        } catch (\Exception  $ex) {
            DB::rollback();
            return redirect()->route('dashboard.doctors.appointmentIndex')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }
    }


}