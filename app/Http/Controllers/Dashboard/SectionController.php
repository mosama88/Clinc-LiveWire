<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SectionRequest;
use App\Http\Requests\Dashboard\SectionUpdateRequest;

class SectionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = Section::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->get();
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->counterUsed = Doctor::select('id')->where("com_code", $com_code)->where("section_id", $info->id)->count();
            }
        }
        return view('dashboard.settings.sections.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = Section::select('id')->where('com_code',$com_code)->where('name',$request->name)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.sections.index')->withErrors(['error' => 'عفوآ أسم القسم  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
           $section = new Section();
           $section['name'] = $request->name;
           $section['created_by'] = auth()->user()->id;
           $section['com_code'] = $com_code;
           $section->save();
            DB::commit();
            return redirect()->route('dashboard.sections.index')->with('success', 'تم أضافة القسم بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.sections.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
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
        $info = Section::findOrFail($id);
        return view('dashboard.settings.sections.edit',compact('info'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionUpdateRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            $checkExistsName = Section::select('id')->where('com_code',$com_code)->where('name',$request->name)->where('id','!=',$id)->first();
            if(!empty($checkExistsName)){
                return redirect()->route('dashboard.sections.index')->withErrors(['error' => 'عفوآ أسم القسم  مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
           $UpdateSection = Section::findOrFail($id);
           $UpdateSection['name'] = $request->name;
           $UpdateSection['updated_by'] = auth()->user()->id;
           $UpdateSection['com_code'] = $com_code;
           $UpdateSection->save();
            DB::commit();
            return redirect()->route('dashboard.sections.index')->with('success', 'تم تعديل القسم بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.sections.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
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
           $DeleteSection = Section::findOrFail($id);
           $DeleteSection->delete();
            DB::commit();
            return redirect()->route('dashboard.sections.index')->with('success', 'تم حذف القسم بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.sections.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }

    }
}
