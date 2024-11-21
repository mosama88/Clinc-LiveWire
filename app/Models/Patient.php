<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = "patients";

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
        return $this->belongsTo(InsuranceCompany::class, 'insurance_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

    public function getAgeAttribute()
    {
        return now()->diffInYears($this->date_of_birth);
    }


}
