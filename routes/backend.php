<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\BranchController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\CurrencyController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\JobGradeController;
use App\Http\Controllers\Dashboard\AdminPanelController;
use App\Http\Controllers\Dashboard\BloodTypesController;
use App\Http\Controllers\Dashboard\DepartmentController;
use App\Http\Controllers\Dashboard\JobCategoryController;
use App\Http\Controllers\Dashboard\NationalityController;
use App\Http\Controllers\Dashboard\QualificationController;
use App\Http\Controllers\Dashboard\SpecializationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', function () {
    return view('dashboard.dashboard');
})->middleware(['auth:admin', 'verified'])->name('dashboard.admin');





Route::middleware(['auth:admin', 'verified'])->prefix('admin')->name('dashboard.')->group(function () {


    //الضبط العام
    Route::resource('admin_panels',  AdminPanelController::class);

    // الدولة
    Route::resource('countries', CountryController::class);

    // المدن
    Route::resource('cities', CityController::class);

    // فصيلة الدم
    Route::resource('BloodTypes', BloodTypesController::class);

    // التخصصات
    Route::resource('specializations', SpecializationController::class);

    // المؤهلات
    Route::resource('qualifications', QualificationController::class);

    // الجنسيات
    Route::resource('nationalities', NationalityController::class);

    // الاقسام
    Route::resource('sections', SectionController::class);

    // الأدارات
    Route::resource('departments', DepartmentController::class);

    // الفئات الوظيفية
    Route::resource('jobCategories', JobCategoryController::class);

    // الدرجه الوظيفية
    Route::resource('jobGrades', JobGradeController::class);

    // الفروع
    Route::resource('branches',  BranchController::class);
    Route::post('branches/getCities', [BranchController::class, 'getCities'])->name('branches.getCities');


    // الموظفين
    Route::resource('employees',  EmployeeController::class);
    Route::post('employees/getCities', [EmployeeController::class, 'getCities'])->name('employees.getCities');



    // الأطباء
    Route::resource('doctors',  DoctorController::class);
    Route::post('doctors/getSpecializations', [DoctorController::class, 'getSpecializations'])->name('doctors.getSpecializations');
    Route::get('/doctor/appointmentIndex', [DoctorController::class, 'appointmentIndex'])->name('doctors.appointmentIndex');
    Route::get('/doctor/appintmentsEdit/{id}', [DoctorController::class, 'appintmentsEdit'])->name('doctors.appintmentsEdit');
    Route::put('/doctor/updateAppintment/{id}', [DoctorController::class, 'updateAppintment'])->name('doctors.updateAppintment');


    // المرضى
    Route::resource('patients',  PatientController::class);
});



Route::middleware('auth:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::get('/{page}', [PageController::class, 'index']);
