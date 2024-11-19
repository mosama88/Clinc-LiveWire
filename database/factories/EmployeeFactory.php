<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Country;
use App\Models\JobGrade;
use App\Models\ShiftType;
use App\Models\BloodTypes;
use App\Models\Department;
use App\Models\Governorate;
use App\Models\JobCategory;
use App\Models\Nationality;
use App\Models\Qualification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

  // تعريف أسماء البنات
$femaleNames = [
    'منى',
    'فاطمة',
    'عائشة',
    'ريم',
    'سارة',
    'نجوى',
    'أسماء',
    'سعاد',
    'هالة',
    'دنيا',
    'علا',
    'رنا',
    'غادة',
    'نجلاء',
    'فريدة',
    'نور'
];

// تعريف أسماء الأولاد
$maleNames = [
    'أحمد',
    'محمد',
    'علي',
    'يوسف',
    'عمر',
    'حسن',
    'إبراهيم',
    'إسماعيل',
    'مالك',
    'أيمن',
    'سالم',
    'حمزة',
    'آدم',
    'سعيد',
    'زيد'
];
        // خلط الأسماء
        shuffle($maleNames);
        shuffle($femaleNames);

        // 'name' => fake()->randomElement(array_merge($male, $female)),
        // 'gender' => $gender = fake()->randomElement(['Male', 'Female']),
        // 'birth_date' => fake()->date('Y-m-d', '-25 years'),

        return [
            'employee_code' => fake()->unique()->numberBetween(1000, 9999),
            'gender' => $gender = fake()->randomElement([1, 2]),
            'name' => $gender === 1
            ? implode(' ', array_slice($maleNames, 0, 3))  // أسماء ذكور فقط
            : fake()->randomElement($femaleNames) . ' ' . implode(' ', array_slice($maleNames, 0, 2)),  // اسم بنت + اسمين ذكور
            // تأكد من عدم وجود مسافة في اسم الحقل
            'email' => fake()->unique()->safeEmail(),
            'brith_date' => fake()->dateTimeBetween('-25 years', 'now')->format('Y-m-d'),
            'religion' => fake()->randomElement(['muslim', 'christian']),
            'nationality_id' => Nationality::all()->random()->id,
            'governorate_id' => Governorate::all()->random()->id,
            'city_id' => City::all()->random()->id,
            'address' => fake()->address(),
            'home_telephone' => fake()->regexify('/^(022|023)[0-9]{7}$/'),
            'mobile' => fake()->regexify('/^(012|015|010|011)[0-9]{8}$/'),
            'social_status' => fake()->randomElement(['divorced', 'married', 'single', 'widowed']),
            'blood_types_id' => BloodTypes::all()->random()->id,
            'branch_id' => Branch::inRandomOrder()->first()->id,
            'qualification_id' => Qualification::all()->random()->id,

            'shift_type_id' => ShiftType::all()->random()->id,

            'qualification_year' => fake()->year('-10 years'),
            'major' => fake()->randomElement(['علوم الحاسوب', 'الرياضيات', 'الفيزياء', 'الهندسة', 'إدارة الأعمال', 'علم الأحياء']),
            'graduation_estimate' => fake()->randomElement(['fair', 'good', 'very_good', 'excellent']),
            'university' => fake()->name(),
            'national_id' => fake()->numerify('##############'),
            'military' => fake()->randomElement(['exemption','exemption_temporary','complete','have_not']),
            'driving_license' => fake()->randomElement([1, 0]),
            'driving_license_type' => fake()->randomElement(['special','first','second','third','fourth','pro','motorcycle']),
            'driving_License_id' => fake()->numerify('##############'),
            'has_relatives' => fake()->randomElement([1, 0]),
            'work_start_date' => fake()->dateTimeBetween('-5 years', 'now')->format('Y-m-d'), // تعديل هنا
            'functional_status' => fake()->randomElement([1, 2]),
            'job_type'=> fake()->randomElement(['doctor', 'employee', 'nurse', 'worker']),
            'department_id' => Department::all()->random()->id,
            'job_category_id' => JobCategory::all()->random()->id,
            'job_grade_id' => JobGrade::all()->random()->id,
            'has_fixed_shift' => fake()->randomElement([1, 2]),
            'daily_work_hour' => rand(7, 12),
            'salary' => $salary = fake()->randomFloat(2, 10500, 50000),
            'day_price' => $salary / 30,
            'motivation_type' => $motivation_type = fake()->randomElement(['changeable', 'none', 'fixed']),
            'motivation_value' => $motivation_type === 'fixed' ? fake()->randomFloat(2, 1000, 2000) : null,
            'fixed_allowances' => fake()->randomElement([0, 1]),
            'social_insurance' => $social_insurance = fake()->randomElement([1, 0]),
            'social_insurance' => $social_insurance = fake()->randomElement([1, 0]),
            'social_insurance_cut_monthely' => $social_insurance === 'Yes' ? fake()->randomFloat(2, 500, 1000) : null,
            'social_insurance_number' => $social_insurance === 'Yes' ? fake()->numerify('##############') : null,
            'medical_insurance' => $medical_insurance = fake()->randomElement([1, 0]),
            'medical_insurance_cut_monthely' => $medical_insurance === 'Yes' ? fake()->randomFloat(2, 500, 1000) : null,
            'medical_insurance_number' => $medical_insurance === 'Yes' ? fake()->numerify('##############') : null,

            'Type_salary_receipt' => fake()->randomElement([0, 1]), // تصحيح هنا
            'bank_number_account' => fake()->bankAccountNumber(),
            'created_by' => Admin::all()->random()->id,
            'com_code' => 1,
             
        ];
    }
}