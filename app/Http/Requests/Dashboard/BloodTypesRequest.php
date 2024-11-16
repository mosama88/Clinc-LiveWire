<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class BloodTypesRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "يرجى كتابة اسم فصيلة الدم",
            'name.max' => "اسم فصيلة الدم يجب ألا يزيد عن الحد 50 المسموح",
        ];
    }
}