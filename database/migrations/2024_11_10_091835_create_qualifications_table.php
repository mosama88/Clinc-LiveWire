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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });


        DB::table('qualifications')->insert([
            [
                'name' => 'بكالوريوس الطب والجراحة',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('qualifications')->insert([
            [
                'name' => 'بكالوريوس الهندسة',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('qualifications')->insert([
            [
                'name' => 'بكالوريوس الآداب',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('qualifications')->insert([
            [
                'name' => 'دبلوم دراسات عليا',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('qualifications')->insert([
            [
                'name' => 'دكتوراه في الفلسفة',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('qualifications')->insert([
            [
                'name' => 'دكتوراه في العلوم',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('qualifications')->insert([
            [
                'name' => 'كلية تمريض',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('qualifications')->insert([
            [
                'name' => 'معهد تمريض',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        
        DB::table('qualifications')->insert([
            [
                'name' => ' ليسانس حقوق',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('qualifications')->insert([
            [
                'name' => 'بكالوريوس نظم و معلومات إدارية',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('qualifications')->insert([
            [
                'name' => 'بكالوريوس تجارة',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('qualifications')->insert([
            [
                'name' => 'بكالوريوس تجارة خارجية',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('qualifications')->insert([
            [
                'name' => 'بكالوريوس إدارة أعمال',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('qualifications')->insert([
            [
                'name' => 'بكالوريوس علوم حاسب',
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
        Schema::dropIfExists('qualifications');
    }
};