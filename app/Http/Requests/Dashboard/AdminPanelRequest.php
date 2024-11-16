<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdminPanelRequest extends FormRequest
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
            'company_name' => 'required|max:50',
            'phones' => 'required|max:150',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:5000',

            
        ];
    }

    public function messages(): array
    {
        return [
            'company_name.required' => "يرجى كتابة اسم الشركة",
            'company_name.max' => "اسم الشركة يجب ألا يزيد عن الحد 50 المسموح",
            'phones.required' => "يرجى كتابة تليفون الشركة",
            'phones.max' => "تليفون الشركة يجب ألا يزيد عن الحد 150 المسموح",
            'photo.mimes' => 'الملفات المسموح بها يجب ان تكون من نوع png,jpg,jpeg',
            'photo.max' => 'اقصى مساحة للملف 5 ميجا',    
        ];
    }
}