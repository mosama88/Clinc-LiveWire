<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class TestsServiceRequest extends FormRequest
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
            'name' => 'required|max:100|',
            'price' => 'required',
            'notes' => 'required|string|max:1500',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "يرجى كتابة اسم خدمه التحاليل",
            'name.max' => "اسم خدمه التحاليل يجب ألا يزيد عن الحد 50 المسموح",
            'price.required' => 'حقل السعر مطلوب.',
            'notes.required' => 'حقل الملاحظات مطلوب.',
            'notes.string' => 'يجب أن تكون الملاحظات نصًا صحيحًا.',
            'notes.max' => 'يجب ألا تزيد الملاحظات عن 1500 حرف.'

        ];
    }
}
