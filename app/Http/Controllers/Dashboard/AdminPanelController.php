<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\AdminPanel;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminPanelRequest;

class AdminPanelController extends Controller
{
  
    
    use UploadTrait;

    
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = AdminPanel::select('*')->where('com_code', $com_code)->first();
        return view('dashboard.admin_panels.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $editData = AdminPanel::findOrFail($id);
        return view('dashboard.admin_panels.edit', compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminPanelRequest $request, $id)
    {


        try{
            DB::beginTransaction();
            $com_code = auth()->user()->com_code;
            $updateAdminPanel = AdminPanel::findOrFail($id);
            $updateAdminPanel['company_name'] = $request->company_name;
            $updateAdminPanel['system_status'] = $request->system_status;
            $updateAdminPanel['phones'] = $request->phones;
            $updateAdminPanel['address'] = $request->address;
            $updateAdminPanel['email'] = $request->email;
            $updateAdminPanel['updated_by'] = auth()->user()->id;
            $updateAdminPanel['com_code'] = $com_code;
         $adminPanel =    $updateAdminPanel->save();
    
         
                 // Check if there's a new photo to upload
    if ($request->hasFile('photo')) {
        // Delete the old image file if it exists
        if ($updateAdminPanel->image) {
            $old_img = $updateAdminPanel->image->filename;
            $this->Delete_attachment('upload_image', 'AdminPanels/photo/' . $old_img, $updateAdminPanel->id);
            $updateAdminPanel->image()->delete(); // Remove the old image record from the database
        }
    
        // Upload the new image and save it in the database
        $this->verifyAndStoreFile($request, 'photo', 'AdminPanels/photo/', 'upload_image', $updateAdminPanel->id, 'App\Models\AdminPanel');
    }
                
    DB::commit();
            return redirect()->route('dashboard.admin_panels.index')->with('success', 'تم تعديل بيانات الشركة بنجاح');            
            
        }catch(\Exception  $ex){
            DB::rollback();
            return redirect()->route('dashboard.admin_panels.index')->withErrors(['error'=> 'عفوآ لقد حدث خطأ !!' . $ex->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}