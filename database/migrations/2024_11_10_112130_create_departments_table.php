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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 225);
            $table->string('phones', 100);
            $table->string('notes', 300)->nullable();
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });

        DB::table('departments')->delete();
        DB::table('departments')->insert([
            [
                'name' => 'إدارة المخاطر ',
                'phones' => "01228759920",
                'notes' => "إدارة مستقلة",
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('departments')->insert([
            [
                'name' => 'الإدارة المالية ',
                'phones' => "01228759920",
                'notes' => "إدارة مستقلة",
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('departments')->insert([
            [
                'name' => 'إدارة التغيير ',
                'phones' => "01228759920",
                'notes' => "إدارة مستقلة",
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('departments')->insert([
            [
                'name' => 'الإدارة التنفيذية',
                'phones' => "01228759920",
                'notes' => "إدارة مستقلة",
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('departments')->insert([
            [
                'name' => 'الإدارة الوسطى',
                'phones' => "01228759920",
                'notes' => "إدارة مستقلة",
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('departments')->insert([
            [
                'name' => 'إدارة الفريق',
                'phones' => "01228759920",
                'notes' => "إدارة مستقلة",
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('departments')->insert([
            [
                'name' => 'إدارة الموارد البشرية',
                'phones' => "01228759920",
                'notes' => "إدارة مستقلة",
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('departments')->insert([
            [
                'name' => 'إدارة الانتاج',
                'phones' => "01228759920",
                'notes' => "إدارة مستقلة",
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('departments')->insert([
            [
                'name' => 'الإدارة العامه',
                'phones' => "01228759920",
                'notes' => "إدارة مستقلة",
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('departments')->insert([
            [
                'name' => 'إدارة التكنولوجيا وعلوم الحاسب',
                'phones' => "01228759920",
                'notes' => "إدارة مستقلة",
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
        Schema::dropIfExists('departments');
    }
};