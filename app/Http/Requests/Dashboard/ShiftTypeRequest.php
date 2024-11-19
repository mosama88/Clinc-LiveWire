<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ShiftTypeRequest extends FormRequest
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
            'name.required' => "يرجى كتابة أسم الشفت ",
            'name.max' => "أسم الشفت  يجب ألا يزيد عن الحد 50 المسموح",

        ];
    }
}