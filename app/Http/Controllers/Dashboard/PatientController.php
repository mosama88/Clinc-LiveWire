<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\BloodTypes;
use App\Models\Governorate;
use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.patients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['nationalities'] = Nationality::get();
        $other['blood_types'] = BloodTypes::get();
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        $other['insurance_companies'] = InsuranceCompany::get();
        return view('dashboard.patients.create',compact('other'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}