<?php

namespace App\http\Livewire\Dashboard;

use App\Models\Appointment;
use Livewire\Component;
use App\Models\Doctor;
use App\Models\Section;
use App\Models\Specialization;
use Livewire\WithPagination;

class AppointMentDoctorComponent extends Component
{

    use WithPagination;


    public $search_name = "";
    public $search_doctor_code = "";
    public $search_appointments = "";
    public $search_section_id = "";
    public $search_specialization = "";



    protected $queryString = [
        'search_name' => ['sa' => 'اسم الدكتور'],
        'search_doctor_code' => ['sa', 'كود الدكتور'],
        'search_appointments' => ['sa' => 'المواعيد'],
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

        if ($this->search_appointments) {
            $query->whereHas('doctorappointments', function ($subQuery) {
                $subQuery->where('name', 'like', '%' . $this->search_appointments . '%');
            });
        }


        if ($this->search_section_id) {
            $query->where('section_id', 'like', '%' . $this->search_section_id . '%');
        }

        if ($this->search_specialization) {
            $query->where('specialization_id', 'like', '%' . $this->search_specialization . '%');
        }


        $data = $query->paginate(10);



        $com_code = auth()->user()->com_code;
        $other['sections'] = Section::all();
        $other['specializations'] = Specialization::all();
        $other['appointments'] = Appointment::all();
        $data = Doctor::select("*")->where('com_code', $com_code)->orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.livewire.appoint-ment-doctor-component',compact('data','other'));
    }
}
