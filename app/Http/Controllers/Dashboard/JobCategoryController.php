<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\JobCategoryRequest;

class JobCategoryController extends Controller
{
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = JobCategory::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.settings.jobCategories.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.jobCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobCategoryRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = JobCategory::select('id')->where('com_code',$com_code)->where('name',$request->name)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.jobCategories.index')->withErrors(['error' => 'عفوآ أسم الدرجه  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
           $jobCategory = new JobCategory();
           $jobCategory['name'] = $request->name;
           $jobCategory['created_by'] = 1;
           $jobCategory['com_code'] = $com_code;
           $jobCategory->save();
            DB::commit();
            return redirect()->route('dashboard.jobCategories.index')->with('success', 'تم أضافة الدرجه الوظيفية بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.jobCategories.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
        $info = JobCategory::findOrFail($id);
        return view('dashboard.settings.jobCategories.edit',compact('info'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobCategoryRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = JobCategory::select('id')->where('com_code',$com_code)->where('name',$request->name)->where('id','!=',$id)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.jobCategories.index')->withErrors(['error' => 'عفوآ أسم الدرجه  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
           $UpdateJobCategory = JobCategory::findOrFail($id);
           $UpdateJobCategory['name'] = $request->name;
           $UpdateJobCategory['updated_by'] = 1;
           $UpdateJobCategory['com_code'] = $com_code;
           $UpdateJobCategory->save();
            DB::commit();
            return redirect()->route('dashboard.jobCategories.index')->with('success', 'تم تعديل الدرجه بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.jobCategories.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
           $DeleteJobCategory = JobCategory::findOrFail($id);
           $DeleteJobCategory->delete();
            DB::commit();
            return redirect()->route('dashboard.jobCategories.index')->with('success', 'تم حذف الدرجه بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.jobCategories.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }

    }
}