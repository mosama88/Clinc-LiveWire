<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Governorate;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Models\InsuranceCompany;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\InsuranceCompanyRequest;

class InsuranceCompanyController extends Controller
{


    use UploadTrait;



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;

        $data = InsuranceCompany::select("*")
        ->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.insuranceCompanies.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['governorates'] = Governorate::get();
        return view('dashboard.insuranceCompanies.create',compact('other'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InsuranceCompanyRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = InsuranceCompany::select('id')->where('com_code',$com_code)->where('name',$request->name)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.insuranceCompanies.index')->withErrors(['error' => 'عفوآ أسم الشركة  مسجل من قبل !!'])->withInput();
            }

            $last_company_code = InsuranceCompany::where('com_code',$com_code)->orderBy('company_code','DESC')->value('company_code');
            $new_company_code = $last_company_code ? $last_company_code + 1 : 1;

            DB::beginTransaction();
           $insertInsuranceCompany = new InsuranceCompany();

           $insertInsuranceCompany['company_code'] = $new_company_code;
           $insertInsuranceCompany['name'] = $request->name;
           $insertInsuranceCompany['address'] = $request->address;
           $insertInsuranceCompany['email'] = $request->email ;
           $insertInsuranceCompany['work_phone'] = $request->work_phone;
           $insertInsuranceCompany['contact_person'] = $request->contact_person;
           $insertInsuranceCompany['mobile_person'] = $request->mobile_person;
           $insertInsuranceCompany['agreement_details'] = $request->agreement_details;
           $insertInsuranceCompany['discount_rate'] = $request->discount_rate;
           $insertInsuranceCompany['governorate_id'] = $request->governorate_id;
           $insertInsuranceCompany['status'] = 1;
           $insertInsuranceCompany['created_by'] = auth()->user()->id;
           $insertInsuranceCompany['com_code'] = $com_code;
           $insertInsuranceCompany->save();

           $this->verifyAndStoreFile($request, 'logo', 'Insurance/photo/', 'upload_image', $insertInsuranceCompany->id, 'App\Models\InsuranceCompany');


           $this->verifyAndStoreArrayFiles($request, 'files', 'Insurance/photo/', 'upload_image', $insertInsuranceCompany->id, 'App\Models\InsuranceCompany');


            DB::commit();
            return redirect()->route('dashboard.insuranceCompanies.index')->with('success', 'تم أضافة شركة التأمين بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.insuranceCompanies.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = InsuranceCompany::findOrFail($id);
        $other['governorates'] = Governorate::get();

        return view('dashboard.insuranceCompanies.show',compact('data','other'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = InsuranceCompany::findOrFail($id);
        $other['governorates'] = Governorate::get();

        return view('dashboard.insuranceCompanies.edit',compact('data','other'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = InsuranceCompany::select('id')->where('com_code',$com_code)->where('name',$request->name)->where('id','!=',$id)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.insuranceCompanies.index')->withErrors(['error' => 'عفوآ أسم الشركة  مسجل من قبل !!'])->withInput();
            }

            $last_company_code = InsuranceCompany::where('com_code',$com_code)->orderBy('company_code','DESC')->value('company_code');
            $new_company_code = $last_company_code ? $last_company_code + 1 : 1;

            DB::beginTransaction();
           $updateInsuranceCompany = InsuranceCompany::findOrFail($id);

           $updateInsuranceCompany['company_code'] = $new_company_code;
           $updateInsuranceCompany['name'] = $request->name;
           $updateInsuranceCompany['address'] = $request->address;
           $updateInsuranceCompany['email'] = $request->email ;
           $updateInsuranceCompany['work_phone'] = $request->work_phone;
           $updateInsuranceCompany['contact_person'] = $request->contact_person;
           $updateInsuranceCompany['mobile_person'] = $request->mobile_person;
           $updateInsuranceCompany['agreement_details'] = $request->agreement_details;
           $updateInsuranceCompany['discount_rate'] = $request->discount_rate;
           $updateInsuranceCompany['governorate_id'] = $request->governorate_id;
           $updateInsuranceCompany['status'] = 1;
           $updateInsuranceCompany['created_by'] = auth()->user()->id;
           $updateInsuranceCompany['com_code'] = $com_code;
           $updateInsuranceCompany->save();

           $this->verifyAndStoreFile($request, 'logo', 'Insurance/photo/', 'upload_image', $updateInsuranceCompany->id, 'App\Models\InsuranceCompany');


           $this->verifyAndStoreArrayFiles($request, 'files', 'Insurance/photo/', 'upload_image', $updateInsuranceCompany->id, 'App\Models\InsuranceCompany');


            DB::commit();
            return redirect()->route('dashboard.insuranceCompanies.index')->with('success', 'تم تعديل شركة التأمين بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.insuranceCompanies.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
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
        $deleteinsertInsurance = InsuranceCompany::where('com_code',$com_code)->findOrFail($id);

        $deleteinsertInsurance->delete();

        if ($request->page_id == 1) {
            // التحقق من وجود صورة
            if ($deleteinsertInsurance->image) {
                $filename = $deleteinsertInsurance->image->filename;
                $path = 'Insurance/photo/' . $filename;

                // حذف الصورة
                $this->Delete_array_attachments('upload_image', $path, $deleteinsertInsurance->image->id);
            }
        }
        DB::commit();
        return redirect()->route('dashboard.insuranceCompanies.index')->with('success', 'تم حذف البيانات بنجاح ' );

    } catch (\Exception  $ex) {
        DB::rollback();
        return redirect()->route('dashboard.insuranceCompanies.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
    }
}
}
