<?php

namespace App\Http\Controllers\Dashboard;

use DateTime;
use App\Models\ShiftType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ShiftTypeRequest;

class ShiftTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = ShiftType::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->get();
        return view('dashboard.settings.shiftTypes.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.settings.shiftTypes.create');
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShiftTypeRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;

    $checkExistsbeforeName = ShiftType::select('id')->where('com_code' ,'=', $com_code)->where('name',$request->name)->first();
    if(!empty($checkExistsbeforeName)){
        return redirect()->route('dashboard.shiftTypes.index')->withErrors(['error' => 'عفوآ أسم الشفت مسجل من قبل !!'])->withInput();
    }


            $fromTime =new DateTime($request->from_time);
            $toTime =new DateTime($request->to_time);
            $totalSeconds = abs(strtotime($fromTime->format('H:i')) - strtotime($toTime->format('H:i')));
            $totalHours = $totalSeconds / 3600;
            
            DB::beginTransaction();
           $insertsShift = new ShiftType();
           $insertsShift['name'] = $request->name;
           $insertsShift['from_time'] = $fromTime->format('H:i');
           $insertsShift['to_time'] = $toTime->format('H:i');
           $insertsShift['total_hours'] = $totalHours;
           $insertsShift['created_by'] = auth()->user()->id;
           $insertsShift['com_code'] = $com_code;
           $insertsShift->save();
            DB::commit();
            return redirect()->route('dashboard.shiftTypes.index')->with('success', 'تم أضافة الشفت بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.shiftTypes.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
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
        $info = ShiftType::findOrFail($id);
        return view('dashboard.settings.shiftTypes.edit',compact('info'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShiftTypeRequest $request, string $id)
    {
        try{

            $com_code = auth()->user()->com_code;

            $checkExistsbeforeName = ShiftType::select('id')->where('com_code' ,'=', $com_code)->where('name',$request->name)->where('id','!=',$id)->first();
            if(!empty($checkExistsbeforeName)){
                return redirect()->route('dashboard.shiftTypes.index')->withErrors(['error' => 'عفوآ أسم الشفت مسجل من قبل !!'])->withInput();
            }

            $UpdateFromTime = new DateTime($request->from_time);
            $UpdateToTime = new DateTime($request->to_time);
            $updateSecondeTime = abs(strtotime($UpdateFromTime->format('H:i')) - strtotime($UpdateToTime->format('H:i')));
            $convertHourseUpdate = $updateSecondeTime / 3600;
            
            DB::beginTransaction();
           $UpdateShift = ShiftType::findOrFail($id);
           $UpdateShift['name'] = $request->name;
           $UpdateShift['from_time'] = $request->from_time;
           $UpdateShift['to_time'] = $request->to_time;
           $UpdateShift['total_hours'] = $convertHourseUpdate;
           $UpdateShift['updated_by'] = 1;
           $UpdateShift['com_code'] = $com_code;
           $UpdateShift->save();
            DB::commit();
            return redirect()->route('dashboard.shiftTypes.index')->with('success', 'تم تعديل الشفت بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.shiftTypes.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
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
           $DeleteShift = ShiftType::where('com_code',$com_code)->findOrFail($id);
           $DeleteShift->delete();
            DB::commit();
            return redirect()->route('dashboard.shiftTypes.index')->with('success', 'تم حذف الشفت بنجاح');

        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.shiftTypes.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }
    }


}