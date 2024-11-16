<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\JobGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\JobGradeRequest;

class JobGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = JobGrade::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.settings.jobGrades.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.jobGrades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobGradeRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = JobGrade::select('id')->where('com_code',$com_code)->where('name',$request->name)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.jobGrades.index')->withErrors(['error' => 'عفوآ أسم الدرجه الوظيفية  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
           $nationality = new JobGrade();
           $nationality['name'] = $request->name;
           $nationality['created_by'] = 1;
           $nationality['com_code'] = $com_code;
           $nationality->save();
            DB::commit();
            return redirect()->route('dashboard.jobGrades.index')->with('success', 'تم أضافة الدرجه الوظيفية بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.jobGrades.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
        $info = JobGrade::findOrFail($id);
        return view('dashboard.settings.jobGrades.edit',compact('info'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobGradeRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = JobGrade::select('id')->where('com_code',$com_code)->where('name',$request->name)->where('id','!=',$id)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.jobGrades.index')->withErrors(['error' => 'عفوآ أسم الدرجه الوظيفية  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
           $UpdateNationality = JobGrade::findOrFail($id);
           $UpdateNationality['name'] = $request->name;
           $UpdateNationality['updated_by'] = 1;
           $UpdateNationality['com_code'] = $com_code;
           $UpdateNationality->save();
            DB::commit();
            return redirect()->route('dashboard.jobGrades.index')->with('success', 'تم تعديل الدرجه الوظيفية بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.jobGrades.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
           $DeleteNationality = JobGrade::findOrFail($id);
           $DeleteNationality->delete();
            DB::commit();
            return redirect()->route('dashboard.jobGrades.index')->with('success', 'تم حذف الدرجه الوظيفية بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.jobGrades.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }

    }
}