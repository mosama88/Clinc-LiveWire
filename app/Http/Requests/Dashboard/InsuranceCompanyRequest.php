<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceCompanyRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'address' => 'required|string|max:500',
            'work_phone' => 'required|string|max:20',
            'mobile_person' => 'required|string|max:20',
            'discount_rate' => 'required|string|max:10',
            'governorate_id' => 'required|exists:governorates,id',
            'logo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "يرجى كتابة اسم الشركه",
            'name.max' => "اسم الشركه يجب ألا يزيد عن الحد 50 المسموح",

            'email.required' => "يرجى كتابة البريد الإلكتروني",
            'email.email' => "يرجى إدخال بريد إلكتروني صحيح",
            'email.max' => "البريد الإلكتروني يجب ألا يزيد عن 50 حرفًا",

            'address.required' => 'العنوان مطلوب.',
            'address.string' => 'يجب أن يكون العنوان نصاً.',
            'address.max' => 'يجب ألا يتجاوز العنوان 500 حرف.',

            'work_phone.required' => 'رقم هاتف الشركة مطلوب.',
            'work_phone.max' => 'يجب ألا يتجاوز رقم هاتف الشركة 20 حرفاً.',

            'mobile.required' => 'رقم الهاتف مطلوب.',
            'mobile.max' => 'يجب ألا يتجاوز رقم الهاتف 20 حرفاً.',

            'discount_rate.required' => 'نسبة الخصم مطلوبة.',
            'discount_rate.max' => 'يجب ألا يتجاوز نسبة الخصم 10 رقمآ.',

            'governorate_id.required' => "يرجى اختيار المحافظة",
            'governorate_id.exists' => "المحافظة المحددة غير موجودة",

            'logo.mimes' => 'يجب أن تكون الصورة بصيغة PNG أو JPG أو JPEG.',
            'logo.max' => 'يجب ألا يتجاوز حجم الصورة 2 ميجابايت.',

        ];
    }
}