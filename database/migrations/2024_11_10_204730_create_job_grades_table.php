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
        Schema::create('job_grades', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });

        DB::table('job_grades')->delete();
        DB::table('job_grades')->insert([
            [
                'name' => 'دكتور إستشارى',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_grades')->insert([
            [
                'name' => 'دكتور أخصائى',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_grades')->insert([
            [
                'name' => 'الدرجه الأولى',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_grades')->insert([
            [
                'name' => 'الدرجه الثانية',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_grades')->insert([
            [
                'name' => 'الدرجه الثالثه',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_grades')->insert([
            [
                'name' => 'الدرجه الرابعه',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);
        
        DB::table('job_grades')->insert([
            [
                'name' => 'الدرجه الخامسه',
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
        Schema::dropIfExists('job_grades');
    }
};