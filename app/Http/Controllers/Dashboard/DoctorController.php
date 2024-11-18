<?php

namespace App\Http\Controllers\Dashboard;

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
        $data = Doctor::select("*")->where('com_code', $com_code)->orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.doctors.index', compact('data'));
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

            $checkExistsEmail = Doctor::select('id')->where('com_code', $com_code)->where('email', $request->email)->first();
            if (!empty($checkExistsEmail)) {
                return redirect()->route('dashboard.doctors.index')->withErrors(['error' => 'عفوآ البريد الالكترونى مسجل  من قبل !!'])->withInput();
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
            $insertDoctor['created_by'] = 1;
            $insertDoctor['com_code'] = $com_code;
            $insertDoctor->save();

            $this->verifyAndStoreFile($request, 'photo', 'Doctor/photo/', 'upload_image', $insertDoctor->id, 'App\Models\Doctor');


            DB::commit();
            return redirect()->route('dashboard.doctors.index')->with('success', 'تم أضافة الطبيب بنجاح');
        } catch (\Exception  $ex) {
            DB::rollback();
            return redirect()->route('dashboard.doctors.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
            $UpdateDoctor['updated_by'] = 1;
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
            return redirect()->route('dashboard.doctors.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
            $DeleteDoctor = Doctor::findOrFail($id);
            $DeleteDoctor->delete();
            DB::commit();
            return redirect()->route('dashboard.doctors.index')->with('success', 'تم حذف الطبيب بنجاح');
        } catch (\Exception  $ex) {
            DB::rollback();
            return redirect()->route('dashboard.doctors.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }
    }

    public function getCities(Request $request)
    {
        if ($request->ajax()) {
            $governorate_id = $request->governorate_id;
            $other['cities'] = City::where('governorate_id', $governorate_id)->get();
            return view('dashboard.doctors.getCitites', compact('other'));
        }
    }
}
