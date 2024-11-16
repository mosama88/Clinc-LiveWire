<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'phones' => 'required|max:20',    
            'notes' => 'nullable|max:100',    
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "يرجى كتابة اسم الاداره",
            'name.max' => "اسم الاداره يجب ألا يزيد عن الحد 50 المسموح",


            'phones.required' => "يرجى كتابة تليفون الاداره",
            'phones.max' => "تليفون الاداره يجب ألا يزيد عن الحد 20 المسموح",

            'notes.max' => "ملاحظات الاداره يجب ألا يزيد عن الحد 100 المسموح",
        ];
    }
}