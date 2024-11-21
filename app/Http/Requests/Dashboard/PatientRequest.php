<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'national_id' => 'required|max:14',
            'mobile' => 'required|string|max:20',
            'alt_mobile' => 'nullable|string|max:20',
            'address' => 'required|string|max:500',
            'email' => 'required|email|max:50', // تعديل في حقل البريد الإلكتروني
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'nationality_id' => 'required||exists:nationalities,id',
            'governorate_id' => 'required|exists:governorates,id',
            'city_id' => 'required|exists:cities,id',
            'insurance_id' => 'nullable|exists:insurance_companies,id',
            'blood_types_id' => 'nullable|exists:blood_types,id',
            'medical_history' => 'nullable|string|max:500',
            'are_previous_surgeries' => 'required',
            'previous_surgeries_details' => 'nullable|string|max:500',
            'Do_you_take_therapy' => 'required',
            'take_therapy_details' => 'nullable|string|max:500',
            'Do_you_chronic_diseases' => 'required',
            'chronic_diseases_details' => 'nullable|string|max:500',
            'notes' => 'nullable|string|max:1000',
        ];
    }



public function messages(): array
{
    return [

            'name.required' => "يرجى كتابة اسم المريض",
            'name.max' => "اسم المريض يجب ألا يزيد عن 50 حرفًا",

            'email.required' => "يرجى كتابة البريد الإلكتروني",
            'email.email' => "يرجى إدخال بريد إلكتروني صحيح",
            'email.max' => "البريد الإلكتروني يجب ألا يزيد عن 50 حرفًا",

            'date_of_birth.required' => 'تاريخ الميلاد مطلوب.',
            'date_of_birth.date' => 'يجب أن يكون تاريخ الميلاد تاريخاً صالحاً.',

            'mobile.required' => 'رقم الهاتف مطلوب.',
            'mobile.max' => 'يجب ألا يتجاوز رقم الهاتف 20 حرفاً.',

            'alt_mobile.max' => 'يجب ألا يتجاوز رقم الهاتف 20 حرفاً.',

            'gender.required' => 'الجنس مطلوب.',

            'nationality_id.required' => 'يرجى تحديد الجنسية.',
            'nationality_id.exists' => 'الجنسية المحددة غير موجودة.',

            'governorate_id.required' => "يرجى اختيار المحافظة",
            'governorate_id.exists' => "المحافظة المحددة غير موجودة",

            'city_id.required' => "يرجى اختيار المدينة",
            'city_id.exists' => "المدينة المحددة غير موجودة",


            'address.required' => 'العنوان مطلوب.',
            'address.string' => 'يجب أن يكون العنوان نصاً.',
            'address.max' => 'يجب ألا يتجاوز العنوان 500 حرف.',

            'insurance_id.exists' => "شركة التأمين التابع لها المريض المحددة غير موجودة",

            'blood_types_id.exists' => 'نوع فصيلة الدم المحدد غير موجود.',

            'medical_history.string' => 'يجب أن يكون التاريخ الطبي نصًا.',
            'medical_history.max' => 'يجب ألا يتجاوز التاريخ الطبي 500 حرف.',

            'are_previous_surgeries.required' => 'يرجى تحديد إذا كانت هناك عمليات جراحية سابقة.',
            'previous_surgeries_details.string' => 'يجب أن تكون تفاصيل العمليات الجراحية نصًا.',
            'previous_surgeries_details.max' => 'يجب ألا تتجاوز تفاصيل العمليات الجراحية 500 حرف.',

            'Do_you_take_therapy.required' => 'يرجى تحديد إذا كنت تتناول علاجًا.',
            'take_therapy_details.string' => 'يجب أن تكون تفاصيل العلاج نصًا.',
            'take_therapy_details.max' => 'يجب ألا تتجاوز تفاصيل العلاج 500 حرف.',

            'Do_you_chronic_diseases.required' => 'يرجى تحديد إذا كنت تعاني من أمراض مزمنة.',
            'chronic_diseases_details.string' => 'يجب أن تكون تفاصيل الأمراض المزمنة نصًا.',
            'chronic_diseases_details.max' => 'يجب ألا تتجاوز تفاصيل الأمراض المزمنة 500 حرف.',

            'notes.string' => 'يجب أن تكون الملاحظات نصًا.',
            'notes.max' => 'يجب ألا تتجاوز الملاحظات 1000 حرف.',

    ];
}
}
