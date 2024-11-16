<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchRequest extends FormRequest
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
                'address' => 'required|string|max:500',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:50', // تعديل في حقل البريد الإلكتروني
                'governorate_id' => 'required|exists:governorates,id',
                'city_id' => 'required|exists:cities,id',
            ];
        }
        
        public function messages(): array
        {
            return [
                'name.required' => "يرجى كتابة اسم الفرع",
                'name.max' => "اسم الفرع يجب ألا يزيد عن 50 حرفًا",
                
                'address.required' => "يرجى كتابة العنوان",
                'address.string' => "يجب أن يكون العنوان نصًا",
                'address.max' => "العنوان يجب ألا يزيد عن 500 حرف",
        
                'phone.required' => "يرجى كتابة رقم الهاتف",
                'phone.string' => "يجب أن يكون رقم الهاتف نصًا",
                'phone.max' => "رقم الهاتف يجب ألا يزيد عن 20 حرفًا",
        
                'email.required' => "يرجى كتابة البريد الإلكتروني",
                'email.email' => "يرجى إدخال بريد إلكتروني صحيح",
                'email.max' => "البريد الإلكتروني يجب ألا يزيد عن 50 حرفًا",
        
                'governorate_id.required' => "يرجى اختيار المحافظة",
                'governorate_id.exists' => "المحافظة المحددة غير موجودة",
        
                'city_id.required' => "يرجى اختيار المدينة",
                'city_id.exists' => "المدينة المحددة غير موجودة",
            ];
        }
        
}