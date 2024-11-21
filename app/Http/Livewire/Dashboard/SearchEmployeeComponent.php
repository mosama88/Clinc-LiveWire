<?php

namespace App\http\Livewire\Dashboard;

use App\Models\City;
use App\Models\Branch;
use App\Models\Section;
use Livewire\Component;
use App\Models\Employee;
use App\Models\JobGrade;
use App\Models\ShiftType;
use App\Models\BloodTypes;
use App\Models\Department;
use App\Models\Governorate;
use App\Models\JobCategory;
use App\Models\Nationality;
use Livewire\WithPagination;
use App\Models\Qualification;

    class SearchEmployeeComponent extends Component
    {
        use WithPagination;

        // protected $paginationTheme = 'bootstrap';

public $search_name = '';
public $search_employee_code = '';
public $search_national_id = "";

public $search_gender = '';

public $search_nationality_id = '';
public $search_department_id = '';
public $search_branch_id = '';

protected $queryString = [
    'search_name'=>['as'=>'اسم الموظف'],
    'search_employee_code'=>['as'=>'كود_الموظف'],
    'search_national_id' => ['sa' => 'رقم قومى'],
    'search_gender'=>['as'=>'نوع الجنس '],
    'search_nationality_id'=>['as'=>'جنسية_الموظف'],
    'search_department_id'=>['as'=>'ادارة الموظف'],
    'search_branch_id'=>['as'=>'الفرع'],
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
    $query = Employee::query();

    // Apply filters
    if ($this->search_name) {
        $query->where('name', 'like', '%' . $this->search_name . '%');
    }

    if ($this->search_employee_code) {
        $query->where('employee_code', $this->search_employee_code);
    }

    if ($this->search_national_id) {
        $query->where('national_id', 'like', '%' . $this->search_national_id . '%');
    }

    if ($this->search_gender) {
        $query->where('gender', $this->search_gender);
    }

    if ($this->search_nationality_id) {
        $query->where('nationality_id', $this->search_nationality_id);
    }

    if ($this->search_department_id) {
        $query->where('department_id', $this->search_department_id);
    }

    if ($this->search_branch_id) {
        $query->where('branch_id', $this->search_branch_id);
    }

    // Pagination for filtered employees
    $data = $query->orderBy('id','DESC')->paginate(10);



    // Fetch other data for filters
    $other = [
        'nationalities' => Nationality::all(),
        'sections' => Section::all(),
        'blood_types' => BloodTypes::all(),
        'branches' => Branch::all(),
        'departments' => Department::all(),
        'governorates' => Governorate::all(),
        'job_categories' => JobCategory::all(),
        'qualifications' => Qualification::all(),
        'shift_types' => ShiftType::all(),
        'cities' => City::all(),
        'job_grades' => JobGrade::all(),
    ];

    return view('dashboard.livewire.search-employee-component', compact('data', 'other'));
}
}
