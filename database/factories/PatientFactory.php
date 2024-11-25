<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\BloodTypes;
use App\Models\City;
use App\Models\Governorate;
use App\Models\InsuranceCompany;
use App\Models\Nationality;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
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

        $address = [
            '30 شارع أحمد عرابي المهندسين الجيزة - 12411 مصر',
            'المنطقة الصناعية الرابعة، قطعة 14، قطع: 4، برج الجديدة',
            'كفر حكيم، امبابة، الجيزة، الجيزة 12511',
            '2- المنيا، المنيا الجديدة، المنيا 61718',
            'مدينة نصر-المنطقة الحرة، القاهرة، القاهرة 11511',
            'ش الأندلس المنوفية 02002',
            'مدينة نصر-المنطقة الحرة، القاهرة، القاهرة 11511',
            '33 شارع سيد علي، الزيتون، القاهرة 11512',
            'المنطقة الصناعية الرابعة، قطعة 14، قطعة 4، برج الإسكندرية الجديدة، الإسكندرية 21511',
            'الاسكندرية 10 شارع سرهنك, لوران, الاسكندرية',
            '26 شارع الجيش، بورسعيد',
            'ميت غمر - الدقهلية - شارع سعد زغلول امام كافيه الوتيدي الدور الثالث',
            '6 أ ميدان أسوان، المهندسين',
            'خلف ش الفريد ليان - مصطفى كامل',
            'كم. 18 جسر السويس ش مختار اباظة',
            '54 ش عبد الخالق ثروت، وسط البلد',
            '8 ش عبد المجيد الرملي، متفرع من 87 باب اللوق',
            '20 شارع صلاح سالم، محطة الرمل',
            '120 شارع محمد فريد، وسط البلد',
            '2أ ش الخليفة المأمون، مصر الجديدة',
            'شارع عرابي وأبو الفدا، بورسعيد',
            'السادس بالقرب من مجمع الأمل، السادس من أكتوبر',
            '7 ش النصر - النزهة الجديدة',
            '50 شارع بورسعيد، كامب شيزار'
        ];


        return [
            'patient_code' => fake()->unique()->numberBetween(1000, 9999),
            'gender' => $gender = fake()->randomElement([1, 2]),
            'name' => $gender === 1
                ? implode(' ', array_slice($maleNames, 0, 3))  // أسماء ذكور فقط
                : fake()->randomElement($femaleNames) . ' ' . implode(' ', array_slice($maleNames, 0, 2)),  // اسم بنت + اسمين ذكور
            // تأكد من عدم وجود مسافة في اسم الحقل
            'email' => fake()->unique()->safeEmail(),
            'date_of_birth' => fake()->dateTimeBetween('-25 years', 'now')->format('Y-m-d'),
            'nationality_id' => Nationality::all()->random()->id,
            'governorate_id' => Governorate::all()->random()->id,
            'city_id' => City::all()->random()->id,
            'insurance_id' => InsuranceCompany::all()->random()->id,
            'blood_types_id' => BloodTypes::all()->random()->id,
            'national_id' => fake()->numerify('##############'),
            'mobile' => fake()->regexify('/^(012|015|010|011)[0-9]{8}$/'),
            'alt_mobile' => fake()->regexify('/^(012|015|010|011)[0-9]{8}$/'),
            'address' => fake()->randomElement($address),
            'medical_history'=>fake()->paragraph(2),
            'are_previous_surgeries' => $are_previous_surgeries = fake()->randomElement([1, 0]),
            'previous_surgeries_details' => $are_previous_surgeries === 1 ? fake()->paragraph() : null,
            'Do_you_take_therapy' => $Do_you_take_therapy = fake()->randomElement([1, 0]),
            'take_therapy_details' => $Do_you_take_therapy === 1 ? fake()->paragraph() : null,
            'Do_you_chronic_diseases' => $Do_you_chronic_diseases = fake()->randomElement([1, 0]),
            'chronic_diseases_details' => $Do_you_chronic_diseases === 1 ? fake()->paragraph() : null,
            'notes'=>fake()->paragraph(2),
            'created_by' => Admin::all()->random()->id,
            'com_code' => 1,

        ];
    }
}
