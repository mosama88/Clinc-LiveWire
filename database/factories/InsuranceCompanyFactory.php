<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Governorate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InsuranceCompany>
 */
class InsuranceCompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
$name_company = [
  'شركة اكسا للتأمين',
'شركة مصر للتأمين',
'شركة أليانز للتأمين',
'شركة قناة السويس للتأمين',
'شركة الدلتا للتأمين',
'شركة تشب',
'المجموعة العربية للتأمين GIG',
'شركة رويال للتأمين',
'شركة ثروة للتأمين',
'شركة QNB للتأمين',
'المصرية للتأمين التكافلي',
'بيت التأمين المصري السعودي',
'شركة بوبا للتأمين',
'شركة اسكان للتأمين',
'الشركة اللبنانية السويسرية تكافل',
'شركة أروب للتأمين',
'شركة طوكيو مارين',
'أورينت للتأمين التكافلي',
'شركة المهندس للتأمين',
'الشركة المصرية الإماراتية للتأمين',
'شركة المتوسط والخليج للتأمين ميد جلف',
'شركة مصر للتأمين التكافلي',
'شركة AIG',
'شركة وثاق للتأمين التكافلي',
'شركة العربى للتأمين'  
];

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
            'company_code' => fake()->unique()->numberBetween(1000, 9999),
            'name' => fake()->randomElement($name_company),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->randomElement($address),
            'work_phone' => fake()->regexify('/^(022|023)[0-9]{7}$/'),
            'mobile_person' => fake()->regexify('/^(012|015|010|011)[0-9]{8}$/'),
            'contact_person'=>fake()->name(),
            'agreement_details'=>fake()->paragraph(),
            'discount_rate' => fake()->numberBetween(10, 50), // خصومات بين 10% و50%
            'governorate_id' => Governorate::all()->random()->id,
            'status' => 1,
            'created_by' => Admin::all()->random()->id,
            'com_code' => 1,
        ];
    }
}