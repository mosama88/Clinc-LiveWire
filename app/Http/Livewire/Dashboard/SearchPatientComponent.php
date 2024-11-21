<?php

namespace App\http\Livewire\Dashboard;

use App\Models\BloodTypes;
use App\Models\City;
use App\Models\Governorate;
use App\Models\InsuranceCompany;
use App\Models\Nationality;
use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class SearchPatientComponent extends Component
{
    use WithPagination;


    public $search_name = "";

    public $search_patient_code = "";

    public $search_national_id = "";

    public $search_mobile = "";

    public $search_gender = "";

    public $search_nationality_id = "";

    public $search_insurance_id = "";



    protected $queryString = [
        'search_name' => ['sa' => 'اسم المريض'],
        'search_patient_code' => ['sa', 'كود المريض'],
        'search_national_id' => ['sa' => 'رقم قومى'],
        'search_mobile' => ['sa' => 'الموبايل'],
        'search_gender' => ['sa' => 'الجنس'],
        'search_nationality_id' => ['sa' => 'الجنسية'],
        'search_insurance_id' => ['sa' => 'شركات التأمين'],
    ];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }


    public function render()
    {

        $query = Patient::query();

        if ($this->search_name) {
            $query->where('name', 'like', '%' . $this->search_name . '%');
        }

        if ($this->search_patient_code) {
            $query->where('patient_code', 'like', '%' . $this->search_patient_code . '%');
        }

        if ($this->search_national_id) {
            $query->where('national_id', 'like', '%' . $this->search_national_id . '%');
        }

        if ($this->search_mobile) {
            $query->where('mobile', 'like', '%' . $this->search_mobile . '%');
        }

        if ($this->search_gender) {
            $query->where('gender', 'like', '%' . $this->search_gender . '%');
        }

        if ($this->search_nationality_id) {
            $query->where('nationality_id', 'like', '%' . $this->search_nationality_id . '%');
        }

        if ($this->search_insurance_id) {
            $query->where('insurance_id', 'like', '%' . $this->search_insurance_id . '%');
        }


        $data = $query->orderBy('id','DESC')->paginate(10);
        $other['nationalities'] = Nationality::get();
        $other['blood_types'] = BloodTypes::get();
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        $other['insurance_companies'] = InsuranceCompany::get();
        return view('dashboard.livewire.search-patient-component',compact('data','other'));
    }
}
