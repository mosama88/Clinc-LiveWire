<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('specializations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('section_id')->references('id')->on('sections')->onUpdate('cascade');
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });


        DB::table('specializations')->insert([
            [
                'name' => 'الأشعة التشخيصية',
                'section_id' => 8,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 12:58:42',
                'updated_at' => '2024-11-13 12:58:42',
            ],
            [
                'name' => 'الأشعة التداخلية',
                'section_id' => 8,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 12:58:51',
                'updated_at' => '2024-11-13 12:58:51',
            ],
            [
                'name' => 'الطب النووي',
                'section_id' => 8,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 12:59:00',
                'updated_at' => '2024-11-13 12:59:00',
            ],
            [
                'name' => 'أمراض القرنية والجفاف',
                'section_id' => 13,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:00:36',
                'updated_at' => '2024-11-13 14:00:36',
            ],
            [
                'name' => 'جراحة العيون',
                'section_id' => 13,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:00:46',
                'updated_at' => '2024-11-13 14:00:46',
            ],
            [
                'name' => 'طب العيون للأطفال',
                'section_id' => 13,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:00:54',
                'updated_at' => '2024-11-13 14:00:54',
            ],
            [
                'name' => 'أمراض الشبكية',
                'section_id' => 13,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:01:03',
                'updated_at' => '2024-11-13 14:01:03',
            ],
            [
                'name' => 'علاج الأورام بالإشعاع',
                'section_id' => 11,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:01:16',
                'updated_at' => '2024-11-13 14:01:16',
            ],
            [
                'name' => 'علاج الأورام الكيميائي',
                'section_id' => 11,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:01:24',
                'updated_at' => '2024-11-13 14:01:24',
            ],
            [
                'name' => 'الأورام النسائية',
                'section_id' => 11,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:01:32',
                'updated_at' => '2024-11-13 14:01:32',
            ],
            [
                'name' => 'أورام الجهاز الهضمي',
                'section_id' => 11,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:01:42',
                'updated_at' => '2024-11-13 14:01:42',
            ],
            [
                'name' => 'التخدير العام',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:01:57',
                'updated_at' => '2024-11-13 14:01:57',
            ],
            [
                'name' => 'التخدير الموضعي',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'العناية المركزة',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'الأمراض الجلدية العامة',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'الأمراض الجلدية التجميلية',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'الأمراض المناعية الجلدية',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'متابعة الحمل والولادة',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'مشاكل الجهاز التناسلي',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'طب الخصوبة والعقم',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'طب الأورام النسائية',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'الجراحة النسائية الترميمية',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'الجراحة العامة',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'جراحة القلب والصدر',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'جراحة الأوعية الدموية',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'جراحة المخ والأعصاب',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'جراحة العظام',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],


            [
                'name' => 'جراحة التجميل والترميم',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'جراحة الأطفال',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'جراحة المسالك البولية',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'أمراض القلب',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'أمراض الجهاز التنفسي',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'أمراض الكبد والجهاز الهضمي',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'أمراض الكلى',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'أمراض الدم',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'الأمراض المعدية',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],

            [
                'name' => 'الغدد الصماء والسكري',
                'section_id' => 10,
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-13 14:02:05',
                'updated_at' => '2024-11-13 14:02:05',
            ],


        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specializations');
    }
};


