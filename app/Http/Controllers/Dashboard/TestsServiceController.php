<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TestsServiceRequest;
use App\Models\TestsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestsServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = TestsService::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->get();
        return view('dashboard.settings.testsServices.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.testsServices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestsServiceRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = TestsService::select('id')->where('com_code',$com_code)->where('name',$request->name)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.testsServices.index')->withErrors(['error' => 'عفوآ أسم خدمة التحاليل  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
            $lastTest_code =  TestsService::where('com_code',$com_code)->orderBy('id','DESC')->value('tests_services_code');
            $newTest_code =  $lastTest_code ? $lastTest_code + 1 : 1;
            $insertRadiology = new TestsService();
            $insertRadiology['name'] = $request->name;
            $insertRadiology['tests_services_code'] = $newTest_code;
            $insertRadiology['price'] = $request->price;
            $insertRadiology['notes'] = $request->notes;
            $insertRadiology['status'] = 1;
            $insertRadiology['created_by'] = auth()->user()->id;
            $insertRadiology['com_code'] = $com_code;
            $insertRadiology->save();
            DB::commit();
            return redirect()->route('dashboard.testsServices.index')->with('success', 'تم أضافة خدمة التحاليل بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.testsServices.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
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
        $info = TestsService::findOrFail($id);
        return view('dashboard.settings.testsServices.edit',compact('info'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestsServiceRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = TestsService::select('id')->where('com_code',$com_code)->where('name',$request->name)->where('id','!=',$id)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.testsServices.index')->withErrors(['error' => 'عفوآ أسم خدمة التحاليل  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
            $UpdateRadiology = TestsService::findOrFail($id);
            $UpdateRadiology['name'] = $request->name;
            $UpdateRadiology['price'] = $request->price;
            $UpdateRadiology['notes'] = $request->notes;
            $UpdateRadiology['status'] = $request->status;
            $UpdateRadiology['updated_by'] = auth()->user()->id;
            $UpdateRadiology['com_code'] = $com_code;
            $UpdateRadiology->save();
            DB::commit();
            return redirect()->route('dashboard.testsServices.index')->with('success', 'تم تعديل خدمة التحاليل بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.testsServices.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
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
            $DeleteRadiology = TestsService::findOrFail($id);
            $DeleteRadiology->delete();
            DB::commit();
            return redirect()->route('dashboard.testsServices.index')->with('success', 'تم حذف خدمة التحاليل بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.testsServices.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }

    }
}
