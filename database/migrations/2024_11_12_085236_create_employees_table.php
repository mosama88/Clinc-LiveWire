<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_code')->nullable()->comment('كود الموظف التلقائي لايتغير');
            $table->string("name", 300)->unique();
            $table->string("email", 100)->unique()->nullable()->comment(" ايميل  الموظف");
            $table->date("brith_date")->nullable()->comment("تاريخ ميلاد الموظف");
            $table->tinyInteger('gender')->comment('1:Male,2:Female');
            $table->enum('religion', ['muslim', 'christian'])->nullable()->comment('حقل الديانة')->default('muslim');
            $table->foreignId("nationality_id")->nullable()->references("id")->on("nationalities")->onUpdate("cascade");
            $table->foreignId("governorate_id")->nullable()->comment("محافظة الموظف")->references("id")->on("governorates")->onUpdate("cascade");
            $table->foreignId("city_id")->nullable()->comment("مدينة الموظف")->references("id")->on("cities")->onUpdate("cascade");
            $table->text("address", 50)->nullable()->comment("عنوان الموظف");
            $table->string("home_telephone", 50)->nullable()->comment("رقم هاتف المنزل");
            $table->string("mobile", 50)->nullable()->comment("رقم هاتف المحمول");
            $table->enum("social_status", ["divorced", "married", "single", "widowed"])->nullable()->default("single")->comment("الحالة الاجتماعية");
            $table->integer('children_number')->nullable()->default(0);
            $table->foreignId("blood_types_id")->nullable()->comment("فصيلة الدم")->references("id")->on("blood_types")->onUpdate("cascade");
            $table->foreignId("branch_id")->comment("الفرع التابع له الموظف ")->references("id")->on("branches")->onUpdate("cascade");
            $table->foreignId("qualification_id")->nullable()->comment("المؤهل التعليمي")->references("id")->on("qualifications")->onUpdate("cascade");
            $table->string("qualification_year", 10)->nullable()->comment("سنة التخرج");
            $table->string("major", 225)->nullable()->comment("تخصص التخرج");
            $table->enum("graduation_estimate", ['fair', 'good', 'very_good', 'excellent'])->nullable()->comment("تقدير التخرج ")->default('fair');
            $table->string("university", 225)->nullable()->comment("جهه التخرج");

            $table->string("national_id", 50)->unique()->nullable()->comment("رقم البطاقة الشخصية - او رقم الهوية");
            $table->enum("military", ["exemption", "exemption_temporary", "complete","have_not"])->nullable()->comment("الحالة العسكرية")->default('exemption_temporary');
            $table->date("military_date_from")->nullable()->comment("تاريخ بداية الخدمة العسكرية");
            $table->date("military_date_to")->nullable()->comment("تاريخ نهاية الخدمة العسكرية");
            $table->string("military_wepon", 500)->nullable()->comment("نوع سلاح الخدمة العسكرية");
            $table->date("military_exemption_date")->nullable()->comment("تاريخ الاعفاء من الخدمه العسكرية");
            $table->string("military_exemption_reason", 500)->nullable()->comment("سبب الاعفاء من الخدمه العسكرية ");
            $table->date("military_postponement_date", 500)->nullable()->comment("تاريخ التأجيل من الخدمه العسكرية ");
            $table->string("military_postponement_reason", 500)->nullable()->comment("سبب التأجيل من الخدمه العسكرية ");
            $table->tinyInteger("driving_license")->nullable()->comment("هل يمتلك رخصه قياده")->default(0);
            $table->enum('driving_license_type', ["special", "first", "second", "third", "fourth", "pro", "motorcycle"])->nullable()->comment("نوع رخصه القيادة")->default("special");
            $table->string("driving_License_id", 50)->nullable()->comment("رقم رخصه القيادة");
            $table->tinyInteger("has_relatives")->nullable()->default(0)->comment("هل له اقارب بالعمل");
            $table->string("relatives_details", 600)->nullable()->comment("تفاصيل الاقارب بالعمل");
            $table->date("work_start_date")->nullable()->comment("تاريخ بدء العمل للموظف");
            $table->tinyInteger("functional_status")->default(1)->comment("حالة الموظف");
            $table->enum("job_type",['doctor','employee','nurse','worker'])->default('employee')->comment("حالة الموظف");
            $table->foreignId("department_id")->references("id")->on("departments")->onUpdate("cascade");
            $table->foreignId("job_grade_id")->comment("الدرجه الوظيفية ")->references("id")->on("job_grades")->onUpdate("cascade");

            $table->foreignId("job_category_id")->nullable()->references("id")->on("job_categories")->onUpdate("cascade");
            $table->tinyInteger("has_fixed_shift")->nullable()->comment("هل للموظف شفت ثابت")->default(1);
            $table->foreignId("shift_type_id")->nullable()->references("id")->on("shift_types")->onUpdate("cascade");
            $table->decimal("daily_work_hour", 20, 2)->nullable()->comment("عدد ساعات العمل للموظف وهذا في حالة ان ليس له شفت ثابت");
            $table->decimal("salary", 20, 2)->nullable()->default(0)->comment("راتب الموظف");
            $table->decimal("day_price", 10, 2)->nullable()->comment("سعر يوم الموظف");
            $table->enum("motivation_type", ["changeable", "none", "fixed"])->nullable()->default("fixed")->comment("واحد ثابت - اثنين متغير");
            $table->decimal("motivation_value", 20, 2)->nullable()->default(0)->comment("قيمة الحافز الثابت ان وجد");
            $table->tinyInteger("fixed_allowances")->nullable()->default(0)->comment("هل له بدلات ثابته");
            $table->tinyInteger("social_insurance")->nullable()->default(1)->comment("هل للموظف تأمين اجتماعي");
            $table->decimal("social_insurance_cut_monthely", 20, 2)->nullable()->comment("  قيمة استقطاع التأمين الاجتماعي الشهري للموظف");
            $table->string("social_insurance_number", 50)->nullable();
            $table->tinyInteger("medical_insurance")->nullable()->default(1)->comment("هل للموظف تأمين طبي");
            $table->decimal("medical_insurance_cut_monthely", 20, 2)->nullable()->comment("  قيمة استقطاع التأمين الطبي الشهري للموظف");
            $table->string("medical_insurance_number", 50)->nullable();
            $table->tinyInteger("Type_salary_receipt")->nullable()->default(1)->comment("نوع صرف الراتب - واحد كاش - اثنين فيزا بنكي");
            $table->text("notes")->nullable();
            $table->string("bank_number_account", 50)->nullable()->comment("رقم حساب البنك للموظف");
            $table->string("urgent_person_details", 600)->nullable()->comment("تفاصيل شخص يمكن الرجوع اليه للوصول للموظف");
            $table->foreignId("created_by")->references("id")->on("admins")->onUpdate("cascade");
            $table->foreignId("updated_by")->nullable()->references("id")->on("admins")->onUpdate("cascade");
            $table->integer("com_code");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
