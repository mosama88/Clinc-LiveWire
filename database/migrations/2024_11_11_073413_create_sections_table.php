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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });

        DB::table('sections')->insert([
            ['id' => 1, 'name' => 'قسم الباطنه', 'created_by' => 1, 'updated_by' => 1, 'com_code' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 3, 'name' => 'قسم الجراحه', 'created_by' => 1, 'updated_by' => 1, 'com_code' => 1, 'created_at' => NULL, 'updated_at' => '2024-11-13 14:05:26'],
            ['id' => 4, 'name' => 'قسم الجهاز الهضمى', 'created_by' => 1, 'updated_by' => 1, 'com_code' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 5, 'name' => 'قسم الصدر', 'created_by' => 1, 'updated_by' => 1, 'com_code' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 6, 'name' => 'قسم الغدد الصماء', 'created_by' => 1, 'updated_by' => 1, 'com_code' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 8, 'name' => 'قسم الأشعة', 'created_by' => 1, 'updated_by' => 1, 'com_code' => 1, 'created_at' => '2024-11-13 12:58:14', 'updated_at' => '2024-11-13 12:58:23'],
            ['id' => 9, 'name' => 'قسم الطوارئ', 'created_by' => 1, 'updated_by' => NULL, 'com_code' => 1, 'created_at' => '2024-11-13 12:59:20', 'updated_at' => '2024-11-13 12:59:20'],
            ['id' => 10, 'name' => 'قسم التخدير والعناية المركزة', 'created_by' => 1, 'updated_by' => 1, 'com_code' => 1, 'created_at' => '2024-11-13 12:59:32', 'updated_at' => '2024-11-13 13:00:23'],
            ['id' => 11, 'name' => 'قسم الأورام', 'created_by' => 1, 'updated_by' => 1, 'com_code' => 1, 'created_at' => '2024-11-13 12:59:41', 'updated_at' => '2024-11-13 13:00:17'],
            ['id' => 12, 'name' => 'قسم الأنف والأذن والحنجرة', 'created_by' => 1, 'updated_by' => 1, 'com_code' => 1, 'created_at' => '2024-11-13 12:59:50', 'updated_at' => '2024-11-13 13:00:11'],
            ['id' => 13, 'name' => 'قسم العيون', 'created_by' => 1, 'updated_by' => NULL, 'com_code' => 1, 'created_at' => '2024-11-13 13:00:02', 'updated_at' => '2024-11-13 13:00:02'],
            ['id' => 15, 'name' => 'قسم الأمراض الجلدية', 'created_by' => 1, 'updated_by' => NULL, 'com_code' => 1, 'created_at' => '2024-11-13 14:02:42', 'updated_at' => '2024-11-13 14:02:42'],
            ['id' => 16, 'name' => 'قسم النساء والتوليد', 'created_by' => 1, 'updated_by' => NULL, 'com_code' => 1, 'created_at' => '2024-11-13 14:03:40', 'updated_at' => '2024-11-13 14:03:40'],
            ['id' => 17, 'name' => 'قسم الطب الرياضي وإصابات الملاعب', 'created_by' => 1, 'updated_by' => NULL, 'com_code' => 1, 'created_at' => '2024-11-13 14:07:56', 'updated_at' => '2024-11-13 14:07:56'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};