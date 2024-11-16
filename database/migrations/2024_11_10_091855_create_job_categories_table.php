<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });

        

        DB::table('job_categories')->insert([
            [
                'name' => 'طبيب عام',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('job_categories')->insert([
            [
                'name' => 'طبيب استشاري',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'أخصائي أمراض القلب',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'أخصائي الجراحة العامة',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'أخصائي الأطفال',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'أخصائي الأشعة',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'تمريض',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('job_categories')->insert([
            [
                'name' => 'موظف استقبال',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);
        DB::table('job_categories')->insert([
            [
                'name' => 'صيدلي مسؤول',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'أخصائي تغذية',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('job_categories')->insert([
            [
                'name' => 'فني تعقيم',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('job_categories')->insert([
            [
                'name' => 'أخصائي نفسية',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'مسؤول سجلات طبية',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'مسؤول المشتريات',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'مسؤول العلاقات العامة',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'مهندس كهرباء',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'مهندس صيانة',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'سائق إسعاف',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'موظف أمن',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        
        DB::table('job_categories')->insert([
            [
                'name' => 'عامل نظافة',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('job_categories')->insert([
            [
                'name' => 'مسؤول خدمات التغذية',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'رئيس قسم العمليات',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);
        DB::table('job_categories')->insert([
            [
                'name' => 'مدير التخطيط والجودة',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);
        DB::table('job_categories')->insert([
            [
                'name' => 'مدير مكافحة العدوى',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);
        DB::table('job_categories')->insert([
            [
                'name' => 'أخصائي التخدير',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);
        DB::table('job_categories')->insert([
            [
                'name' => 'أخصائي الطوارئ',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'محامى',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('job_categories')->insert([
            [
                'name' => 'IT',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'HR',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);



        DB::table('job_categories')->insert([
            [
                'name' => 'المبيعات',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('job_categories')->insert([
            [
                'name' => 'محاسب',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'مدير مالى',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('job_categories')->insert([
            [
                'name' => 'مهندس شبكات',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);



        DB::table('job_categories')->insert([
            [
                'name' => 'مهندس تطوير الويب',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);



        DB::table('job_categories')->insert([
            [
                'name' => 'مصمم جرافيك',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_categories');
    }
};