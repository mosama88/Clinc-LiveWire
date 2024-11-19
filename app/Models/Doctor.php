<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Doctor extends Model
{
    use HasFactory;
    protected $table = "doctors";

    protected $guarded = [];


    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function doctorappointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointments_doctors', 'doctor_id', 'appointment_id');
    }


    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }


    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
