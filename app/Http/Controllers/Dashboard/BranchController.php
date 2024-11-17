<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Branch;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BranchRequest;
use App\Http\Requests\Dashboard\UpdateBranchRequest;

class BranchController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        $data = Branch::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.settings.branches.index',compact('data','other'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        return view('dashboard.settings.branches.create',compact('other'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;

    $checkExistsbeforeName = Branch::select('id')->where('com_code' ,'=', $com_code)->where('name',$request->name)->first();
    if(!empty($checkExistsbeforeName)){
        return redirect()->route('dashboard.branches.index')->withErrors(['error' => 'عفوآ أسم الفرع مسجل من قبل !!'])->withInput();
    }
  
    $checkExistsbeforeEmail = Branch::select('id')->where('com_code' ,'=', $com_code)->where('email',$request->email)->first();
    if(!empty($checkExistsbeforeEmail)){
        return redirect()->route('dashboard.branches.index')->withErrors(['error' => 'عفوآ البريد الالكترونى للفرع مسجل من قبل !!'])->withInput();
    }
            
            DB::beginTransaction();
           $Branch = new Branch();
           $Branch['name'] = $request->name;
           $Branch['address'] = $request->address;
           $Branch['phone'] = $request->phone;
           $Branch['email'] = $request->email ;
           $Branch['governorate_id'] = $request->governorate_id;
           $Branch['city_id'] = $request->city_id;
           $Branch['status'] = 1;
           $Branch['created_by'] = 1;
           $Branch['com_code'] = $com_code;
           $Branch->save();
            DB::commit();
            return redirect()->route('dashboard.branches.index')->with('success', 'تم أضافة الفرع بنجاح');            
            
        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.branches.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
        $info = Branch::findOrFail($id);
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        return view('dashboard.settings.branches.edit',compact('info','other'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBranchRequest $request, string $id)
    {
        try{
            
            $com_code = auth()->user()->com_code;

            $checkExistsbeforeName = Branch::select('id')->where('com_code' ,'=', $com_code)->where('name',$request->name)->where('id','!=',$id)->first();
            if(!empty($checkExistsbeforeName)){
                return redirect()->route('dashboard.branches.index')->withErrors(['error' => 'عفوآ أسم الفرع مسجل من قبل !!'])->withInput();
            }
          
            $checkExistsbeforeEmail = Branch::select('id')->where('com_code' ,'=', $com_code)->where('email',$request->email)->where('id','!=',$id)->first();
            if(!empty($checkExistsbeforeEmail)){
                return redirect()->route('dashboard.branches.index')->withErrors(['error' => 'عفوآ البريد الالكترونى للفرع مسجل من قبل !!'])->withInput();
            }
        

            
            DB::beginTransaction();
           $UpdateBranch = Branch::findOrFail($id);
           $UpdateBranch['name'] = $request->name;
           $UpdateBranch['address'] = $request->address;
           $UpdateBranch['phone'] = $request->phone;
           $UpdateBranch['email'] = $request->email ;
           $UpdateBranch['governorate_id'] = $request->governorate_id;
           $UpdateBranch['city_id'] = $request->city_id;
           $UpdateBranch['status'] = $request->status;
           $UpdateBranch['updated_by'] = 1;
           $UpdateBranch['com_code'] = $com_code;
           $UpdateBranch->save();
            DB::commit();
            return redirect()->route('dashboard.branches.index')->with('success', 'تم تعديل الفرع بنجاح');            
            
        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.branches.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
           $DeleteBranch = Branch::findOrFail($id);
           $DeleteBranch->delete();
            DB::commit();
            return redirect()->route('dashboard.branches.index')->with('success', 'تم حذف الفرع بنجاح');            
            
        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.branches.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }
    }

    public function getCities(Request $request)
{
    if ($request->ajax()) {
        $governorate_id = $request->governorate_id;
        $other['cities'] = City::where('governorate_id', $governorate_id)->get();
        return view('dashboard.settings.branches.getCitites',compact('other'));
    }
}






    
}