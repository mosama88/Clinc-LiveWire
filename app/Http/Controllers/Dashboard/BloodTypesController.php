<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\BloodTypes;
use App\Models\Employee;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BloodTypesRequest;

class BloodTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = BloodTypes::select("*")->where('com_code', $com_code)->orderBy('id', 'DESC')->get();

        if (!empty($data)) {
            foreach ($data as $info) {
                $info->counterUsed = Employee::select('id')->where("com_code", $com_code)->where("blood_types_id", $info->id)->count();
            }
        }
        return view('dashboard.settings.BloodTypes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.BloodTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BloodTypesRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;


            $checkExistsName = BloodTypes::select('id')->where('com_code', $com_code)->where('name', $request->name)->first();
            if (!empty($checkExistsName)) {
                return redirect()->route('dashboard.BloodTypes.index')->withErrors(['error' => 'عفوآ أسم فصيلة الدم مسجلة من قبل !!'])->withInput();
            }

            DB::beginTransaction();
            $blood = new BloodTypes();
            $blood['name'] = $request->name;
            $blood['created_by'] = auth()->user()->id;
            $blood['com_code'] = $com_code;
            $blood->save();
            DB::commit();
            return redirect()->route('dashboard.BloodTypes.index')->with('success', 'تم أضافة فصيلة الدم بنجاح');
        } catch (\Exception  $ex) {
            DB::rollback();
            return redirect()->route('dashboard.BloodTypes.index')->withErrors(['error' => 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
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
        $info = BloodTypes::findOrFail($id);
        return view('dashboard.settings.BloodTypes.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BloodTypesRequest $request, string $id)
    {
        try {
            $com_code = auth()->user()->com_code;
            $checkExistsName = BloodTypes::select('id')->where('com_code', $com_code)->where('name', $request->name)->where('id', '!=', $id)->first();
            if (!empty($checkExistsName)) {
                return redirect()->route('dashboard.BloodTypes.index')->withErrors(['error' => 'عفوآ أسم فصيلة الدم مسجلة من قبل !!'])->withInput();
            }
            DB::beginTransaction();
            $Updateblood = BloodTypes::findOrFail($id);
            $Updateblood['name'] = $request->name;
            $Updateblood['updated_by'] = auth()->user()->id;
            $Updateblood['com_code'] = $com_code;
            $Updateblood->save();
            DB::commit();
            return redirect()->route('dashboard.BloodTypes.index')->with('success', 'تم تعديل فصيلة الدم بنجاح');
        } catch (\Exception  $ex) {
            DB::rollback();
            return redirect()->route('dashboard.BloodTypes.index')->withErrors(['error' => 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $com_code = auth()->user()->com_code;
            $counterUsed =  Employee::where("com_code", $com_code)->where("blood_types_id", $id)->count();
            if ($counterUsed > 0) {
return redirect()->route('dashboard.BloodTypes.index')->withErrors(['error' => 'عفوًا، لا يمكن الحذف لأنه قد تم استخدامه من قبل']);
            }
            $counterUsedPatient =  Patient::where("com_code", $com_code)->where("blood_types_id", $id)->count();
            if ($counterUsedPatient > 0) {
return redirect()->route('dashboard.BloodTypes.index')->withErrors(['error' => 'عفوًا، لا يمكن الحذف لأنه قد تم استخدامه من قبل']);
            }
            DB::beginTransaction();
            $Deleteblood = BloodTypes::findOrFail($id);
            $Deleteblood->delete();
            DB::commit();
            return redirect()->route('dashboard.BloodTypes.index')->with('success', 'تم حذف فصيلة الدم بنجاح');
        } catch (\Exception  $ex) {
            DB::rollback();
            return redirect()->route('dashboard.BloodTypes.index')->withErrors(['error' => 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }
    }
}
