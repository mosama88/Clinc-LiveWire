<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class InsuranceCompany extends Model
{
    use HasFactory;
    
    protected $table = "insurance_companies";

    protected $guarded = [];



    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }


    
    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }


    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }
}