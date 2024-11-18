<?php

namespace App\http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Doctor;
use App\Models\Section;
use App\Models\Specialization;
use Livewire\WithPagination;

class SearchDoctorComponent extends Component
{

    use WithPagination;


    public $search_name = "";
    public $search_doctor_code = "";
    public $search_gender = "";
    public $search_title = "";
    public $search_section_id = "";
    public $search_specialization = "";



    protected $queryString = [
        'search_name' => ['sa' => 'اسم الدكتور'],
        'search_gender' => ['sa' => 'الجنس'],
        'search_doctor_code' => ['sa', 'كود الدكتور'],
        'search_title' => ['sa' => 'درجة الدكتور الوظيفية'],
        'search_section_id' => ['sa' => 'القسم'],
        'search_specialization' => ['sa' => 'التخصص'],
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



        $query = Doctor::query();

        if ($this->search_name) {
            $query->where('name', 'like', '%' . $this->search_name . '%');
        }

        if ($this->search_doctor_code) {
            $query->where('doctor_code', 'like', '%' . $this->search_doctor_code . '%');
        }

        if ($this->search_gender) {
            $query->where('gender', 'like', '%' . $this->search_gender . '%');
        }

        if ($this->search_title) {
            $query->where('title', 'like', '%' . $this->search_title . '%');
        }

        if ($this->search_section_id) {
            $query->where('section_id', 'like', '%' . $this->search_section_id . '%');
        }

        if ($this->search_specialization) {
            $query->where('specialization_id', 'like', '%' . $this->search_specialization . '%');
        }


        $data = $query->paginate(10);


        // Fetch other data for filters
        $other = [
            'sections' => Section::all(),
            'specializations' => Specialization::all(),
        ];



        return view('dashboard.livewire.search-doctor-component', compact('data','other'));
    }
}
