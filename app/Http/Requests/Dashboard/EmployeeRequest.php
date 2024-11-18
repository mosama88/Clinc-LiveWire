<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'email' => 'required|email|max:50', // تعديل في حقل البريد الإلكتروني
            'brith_date' => 'required|date',
            'gender' => 'required',
            'religion' => 'required|in:muslim,christian',
            'nationality_id' => 'required||exists:nationalities,id',
            'governorate_id' => 'required|exists:governorates,id',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|string|max:500',
            'home_telephone' => 'required|string|max:20',
            'mobile' => 'required|string|max:20',
            'social_status' => 'required|in:divorced,married,single,widowed',
            'blood_types_id' => 'nullable|exists:blood_types,id',
            'branch_id' => 'required|exists:branches,id',
            'qualification_id' => 'required|exists:qualifications,id',
            'qualification_year' => 'nullable|date',
            'major' => 'required|string|max:100',
            'graduation_estimate' => 'nullable|in:fair,good,very_good,excellent',
            'university' => 'nullable|string|max:100',
            'national_id' => 'required|max:14', // تعديل في حقل البريد الإلكتروني
            'military' => 'required|in:exemption,exemption_temporary,complete,have_not',
            'military_date_from' => 'nullable|date',
            'military_date_to' => 'nullable|date|after:military_date_from',
            'military_wepon' => 'nullable|string',
            'military_exemption_date' => 'nullable|date',
            'military_exemption_reason' => 'nullable|string',
            'military_postponement_date' => 'nullable|date',
            'military_postponement_reason' => 'nullable|string',
            'driving_license' => 'required',
            'driving_license_type' => 'nullable|in:special,first,second,third,fourth,pro,motorcycle',
            'driving_License_id' => 'nullable|string|max:14',
            'has_relatives' => 'required',
            'work_start_date' => 'nullable|date',
            'functional_status' => 'required',
            'department_id' => 'required|exists:departments,id',
            'job_grade_id' => 'required|exists:job_grades,id',
            'job_category_id' => 'required|exists:job_categories,id',
            'has_fixed_shift' => 'required',
//            'shift_type_id' => 'required|exists:shift_types,id',
            'daily_work_hour' => 'required',
            'salary' => 'required',
            'day_price' => 'required',
            'motivation_type' => 'required|in:changeable,none,fixed',
            'fixed_allowances' => 'required',
            'social_insurance' => 'required',
            'medical_insurance' => 'required',
            'Type_salary_receipt' => 'required',












        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "يرجى كتابة اسم الفرع",
            'name.max' => "اسم الفرع يجب ألا يزيد عن 50 حرفًا",

            'email.required' => "يرجى كتابة البريد الإلكتروني",
            'email.email' => "يرجى إدخال بريد إلكتروني صحيح",
            'email.max' => "البريد الإلكتروني يجب ألا يزيد عن 50 حرفًا",

            'brith_date.required' => 'تاريخ الميلاد مطلوب.',
            'brith_date.date' => 'يجب أن يكون تاريخ الميلاد تاريخاً صالحاً.',

            'gender.required' => 'الجنس مطلوب.',

            'religion.required' => 'يرجى تحديد الديانة.',
            'religion.in' => 'يجب أن تكون الديانة إما مسلم أو مسيحي.',

            'nationality_id.required' => 'يرجى تحديد الجنسية.',
            'nationality_id.exists' => 'الجنسية المحددة غير موجودة.',

            'governorate_id.required' => "يرجى اختيار المحافظة",
            'governorate_id.exists' => "المحافظة المحددة غير موجودة",

            'city_id.required' => "يرجى اختيار المدينة",
            'city_id.exists' => "المدينة المحددة غير موجودة",


            'address.required' => 'العنوان مطلوب.',
            'address.string' => 'يجب أن يكون العنوان نصاً.',
            'address.max' => 'يجب ألا يتجاوز العنوان 500 حرف.',

            'home_telephone.required' => 'رقم الهاتف المنزلي مطلوب.',
            'home_telephone.string' => 'يجب أن يكون رقم الهاتف المنزلي نصاً.',
            'home_telephone.max' => 'يجب ألا يتجاوز رقم الهاتف المنزلي 20 حرفاً.',

            'mobile.required' => 'رقم الهاتف مطلوب.',
            'mobile.string' => 'يجب أن يكون رقم الهاتف نصاً.',
            'mobile.max' => 'يجب ألا يتجاوز رقم الهاتف 20 حرفاً.',

            'social_status.required' => 'الحالة الاجتماعية مطلوبة.',
            'social_status.in' => 'يجب أن تكون الحالة الاجتماعية إحدى القيم: أعزب، متزوج، مطلق، أرمل.',

            'blood_types_id.exists' => 'نوع فصيلة الدم المختار غير موجود.',

            'branch_id.required' => 'الفرع مطلوب.',
            'branch_id.exists' => 'الفرع المختار غير موجود.',

            'qualification_id.required' => 'المؤهل العلمي مطلوب.',
            'qualification_id.exists' => 'المؤهل العلمي المختار غير موجود.',

            'qualification_year.date' => 'يجب أن يكون سنة المؤهل رقماً.',

            'major.required' => 'التخصص مطلوب.',
            'major.string' => 'يجب أن يكون التخصص نصاً.',
            'major.max' => 'يجب ألا يتجاوز التخصص 100 حرف.',

            'graduation_estimate.in' => 'تقدير التخرج يجب أن يكون إحدى القيم: مقبول، جيد، جيد جداً، ممتاز.',

            'university.string' => 'يجب أن يكون اسم الجامعة نصاً.',
            'university.max' => 'يجب ألا يتجاوز اسم الجامعة 100 حرف.',

            'national_id.required' => 'رقم الهوية الوطنية مطلوب.',
            'national_id.max' => 'يجب ألا يزيد رقم الهوية الوطنية عن 14 رقماً.',

            'military.required' => 'حالة التجنيد مطلوبة.',
            'military.in' => 'يجب أن تكون حالة التجنيد إحدى القيم: إعفاء، إعفاء مؤقت، مكتمل، لم يحصل.',

            'military_date_from.date' => 'يجب أن يكون تاريخ البداية للتجنيد تاريخاً صالحاً.',
            'military_date_to.date' => 'يجب أن يكون تاريخ النهاية للتجنيد تاريخاً صالحاً.',
            'military_date_to.after' => 'تاريخ النهاية يجب أن يكون بعد تاريخ البداية.',

            'military_wepon.string' => 'يجب أن يكون اسم السلاح نصاً.',

            'military_exemption_date.date' => 'يجب أن يكون تاريخ الإعفاء تاريخاً صالحاً.',
            'military_exemption_reason.string' => 'يجب أن يكون سبب الإعفاء نصاً.',

            'military_postponement_date.date' => 'يجب أن يكون تاريخ التأجيل تاريخاً صالحاً.',
            'military_postponement_reason.string' => 'يجب أن يكون سبب التأجيل نصاً.',

            'driving_license.required' => 'رخصة القيادة مطلوبة.',
            'driving_license_type.in' => 'نوع رخصة القيادة يجب أن يكون إحدى القيم: خاصة، أولى، ثانية، ثالثة، رابعة، محترفة، دراجة نارية.',

            'driving_License_id.max' => 'يجب ألا يزيد رقم رخصة القيادة عن 14 رقماً.',

            'has_relatives.required' => 'يرجى تحديد ما إذا كان الموظف لديه أقارب.',

            'work_start_date.date' => 'يجب أن يكون تاريخ بدء العمل تاريخاً صالحاً.',

            'functional_status.required' => 'حالة الوظيفة مطلوبة.',

            'department_id.required' => 'القسم مطلوب.',
            'department_id.exists' => 'القسم المحدد غير موجود.',

            'job_grade_id.required' => 'الدرجة الوظيفية مطلوبة.',
            'job_grade_id.exists' => 'الدرجة الوظيفية المحددة غير موجودة.',

            'job_category_id.required' => 'فئة الوظيفة مطلوبة.',
            'job_category_id.exists' => 'فئة الوظيفة المحددة غير موجودة.',

            'has_fixed_shift.required' => 'يرجى تحديد ما إذا كان للموظف وردية ثابتة.',

            'shift_type_id.required' => 'نوع الوردية مطلوب.',
            'shift_type_id.exists' => 'نوع الوردية المحدد غير موجود.',

            'daily_work_hour.required' => 'عدد ساعات العمل اليومية مطلوب.',

            'salary.required' => 'الراتب مطلوب.',

            'day_price.required' => 'سعر اليوم مطلوب.',

            'motivation_type.required' => 'نوع الحافز مطلوب.',
            'motivation_type.in' => 'نوع الحافز يجب أن يكون إحدى القيم: متغير، بدون، ثابت.',

            'fixed_allowances.required' => 'البدلات الثابتة مطلوبة.',

            'social_insurance.required' => 'يرجى تحديد ما إذا كان الموظف لديه تأمين اجتماعي.',

            'medical_insurance.required' => 'يرجى تحديد ما إذا كان الموظف لديه تأمين طبي.',

            'Type_salary_receipt.required' => 'نوع استلام الراتب مطلوب.',
        ];
    }

}
