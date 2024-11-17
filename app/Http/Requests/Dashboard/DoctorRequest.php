<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

     public function authorize(): bool
     {
         return true;
     }


     
    public function rules(): array
    {
        return [
            'name' => 'required|max:50',
            'title' => 'required|max:50',
            'email' => 'required|email|max:50', // تعديل في حقل البريد الإلكتروني
            'gender' => 'required',
            'national_id' => 'required|max:14', // تعديل في حقل البريد الإلكتروني
            'nationality_id' => 'required||exists:nationalities,id',
            'address' => 'required|string|max:500',
            'mobile' => 'required|string|max:20',
            'specialization_id' => 'required|exists:specializations,id',
            'section_id' => 'required|exists:sections,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "يرجى كتابة اسم الفرع",
            'name.max' => "اسم الفرع يجب ألا يزيد عن 50 حرفًا",


            'title.required' => "يرجى كتابة المسمى الوظيفى",
            'title.max' => " المسمى الوظيفى يجب ألا يزيد عن 50 حرفًا",

            
            'email.required' => "يرجى كتابة البريد الإلكتروني",
            'email.email' => "يرجى إدخال بريد إلكتروني صحيح",
            'email.max' => "البريد الإلكتروني يجب ألا يزيد عن 50 حرفًا",

            'gender.required' => 'الجنس مطلوب.',

            'nationality_id.required' => 'يرجى تحديد الجنسية.',
            'nationality_id.exists' => 'الجنسية المحددة غير موجودة.',

            'address.required' => 'العنوان مطلوب.',
            'address.string' => 'يجب أن يكون العنوان نصاً.',
            'address.max' => 'يجب ألا يتجاوز العنوان 500 حرف.',

            'mobile.required' => 'رقم الهاتف مطلوب.',
            'mobile.string' => 'يجب أن يكون رقم الهاتف نصاً.',
            'mobile.max' => 'يجب ألا يتجاوز رقم الهاتف 20 حرفاً.',

            'national_id.required' => 'رقم الهوية الوطنية مطلوب.',
            'national_id.max' => 'يجب ألا يزيد رقم الهوية الوطنية عن 14 رقماً.',

            'specialization_id.required' => "يرجى اختيار التخصص",
            'specialization_id.exists' => "التخصص المحددة غير موجودة",

            'section_id.required' => "يرجى اختيار القسم",
            'section_id.exists' => "القسم المحددة غير موجودة",

                 ];
    }

}