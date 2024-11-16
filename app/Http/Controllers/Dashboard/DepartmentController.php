<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DepartmentRequest;

class DepartmentController extends Controller
{
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = Department::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.settings.departments.index',compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = Department::select('id')->where('com_code',$com_code)->where('name',$request->name)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.cities.index')->withErrors(['error' => 'عفوآ أسم الأداراه الدم مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
           $Department = new Department();
           $Department['name'] = $request->name;
           $Department['phones'] = $request->phones;
           $Department['notes'] = $request->notes;
           $Department['created_by'] = 1;
           $Department['com_code'] = $com_code;
           $Department->save();
            DB::commit();
            return redirect()->route('dashboard.departments.index')->with('success', 'تم أضافة الأداراه  بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.departments.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
        $info = Department::findOrFail($id);
        return view('dashboard.settings.departments.edit',compact('info'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = Department::select('id')->where('com_code',$com_code)->where('name',$request->name)->where('id','!=',$id)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.departments.index')->withErrors(['error' => 'عفوآ أسم الأداراه  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
           $UpdateDepartment = Department::findOrFail($id);
           $UpdateDepartment['name'] = $request->name;
           $UpdateDepartment['phones'] = $request->phones;
           $UpdateDepartment['notes'] = $request->notes;
           $UpdateDepartment['updated_by'] = 1;
           $UpdateDepartment['com_code'] = $com_code;
           $UpdateDepartment->save();
            DB::commit();
            return redirect()->route('dashboard.departments.index')->with('success', 'تم تعديل الأداراه بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.departments.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
           $DeleteDepartment = Department::findOrFail($id);
           $DeleteDepartment->delete();
            DB::commit();
            return redirect()->route('dashboard.departments.index')->with('success', 'تم حذف الأداراه بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.departments.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }

    }
}