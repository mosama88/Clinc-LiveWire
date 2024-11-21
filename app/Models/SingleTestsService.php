<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleTestsService extends Model
{
    use HasFactory;


    protected $table = "single_tests_services";

    protected $guarded = [];


    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }


    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    public function insurance()
    {
        return $this->belongsTo(InsuranceCompany::class, 'insurance_code');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_code');
    }

    public function testsService()
    {
        return $this->belongsTo(TestsService::class, 'test_service_id');
    }


}

