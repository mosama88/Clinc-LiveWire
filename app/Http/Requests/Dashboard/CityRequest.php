<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
                'governorate_id' => 'required|exists:governorates,id',
            ];
        }
        
        public function messages(): array
        {
            return [
                'name.required' => "يرجى كتابة اسم المدينه",
                'name.max' => "اسم الكدينه يجب ألا يزيد عن 50 حرفًا",

                
                'governorate_id.required' => "يرجى اختيار المحافظة",
                'governorate_id.exists' => "المحافظة المحددة غير موجودة",
            ];
        }
        
}