<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Section;
use App\Models\Nationality;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */






    
    public function definition(): array
    {

        $femaleNames = [
            'امال',
            'فاطمة',
            'ريهام',
            'ريتال',
            'سارة',
            'نجوى',
            'مكه',
            'سعاد',
            'هالة',
            'ليلى',
            'علا',
            'وفاء',
            'رجاء',
            'نورهان',
            'فريدة',
            'هبه'
        ];
        
        // تعريف أسماء الأولاد
        $maleNames = [
            'عبدالرحمن',
            'السديس',
            'فكرى',
            'يوسف',
            'عمرو',
            'شكرى',
            'ادريس',
            'اسحاق',
            'ماليك',
            'ياسر',
            'سالم',
            'حمزة',
            'آدم',
            'سعد',
            'ابوزيد'
        ];
        // خلط الأسماء
        shuffle($maleNames);
        shuffle($femaleNames);
        
        return [
            'doctor_code' => fake()->unique()->numberBetween(1000, 9999),
'gender' => $gender = fake()->randomElement([1, 2]),
            'name' => $gender === 1
            ? implode(' ', array_slice($maleNames, 0, 3))  // أسماء ذكور فقط
            : fake()->randomElement($femaleNames) . ' ' . implode(' ', array_slice($maleNames, 0, 2)),  // اسم بنت + اسمين ذكور
            'national_id' => fake()->numerify('##############'),
            // تأكد من عدم وجود مسافة في اسم الحقل
            'email' => fake()->unique()->safeEmail(),
            'mobile' => fake()->regexify('/^(012|015|010|011)[0-9]{8}$/'),
            'address' => fake()->address(),
            'title' => fake()->title(),
            'status' => fake()->randomElement([1, 2]),
            'nationality_id' => Nationality::all()->random()->id,
            'specialization_id' => Specialization::all()->random()->id,
            'section_id' => Section::all()->random()->id,
            'created_by' => Admin::all()->random()->id,
            'com_code' => 1,
        ];
    }
}