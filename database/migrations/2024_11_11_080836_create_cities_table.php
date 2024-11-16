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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('governorate_id')->references('id')->on('governorates');
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });


        DB::table('cities')->insert([
            [
                'name' => 'السبتيه',
                'governorate_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);


        DB::table('cities')->insert([
            [
                'name' => 'الهرم',
                'governorate_id' => 2,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);


        DB::table('cities')->insert([
            [
                'name' => 'مدية نصر',
                'governorate_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);


        DB::table('cities')->insert([
            [
                'name' => 'مصر الجديده',
                'governorate_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);

        DB::table('cities')->insert([
            [
                'name' => 'حلمية الزيتون',
                'governorate_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);


        DB::table('cities')->insert([
            [
                'name' => 'المهندسين',
                'governorate_id' => 2,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);


        DB::table('cities')->insert([
            [
                'name' => 'الدقى',
                'governorate_id' => 2,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);

        DB::table('cities')->insert([
            [
                'name' => 'فيصل',
                'governorate_id' => 2,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);

        DB::table('cities')->insert([
            [
                'name' => 'العمرانية',
                'governorate_id' => 2,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);

        DB::table('cities')->insert([
            [
                'name' => '٦ أكتوبر',
                'governorate_id' => 2,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);

        DB::table('cities')->insert([
            [
                'name' => 'بولاق الدكرور',
                'governorate_id' => 2,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);

        DB::table('cities')->insert([
            [
                'name' => 'بولاق ابوالعلا',
                'governorate_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);

        DB::table('cities')->insert([
            [
                'name' => 'جسر السويس',
                'governorate_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);

        DB::table('cities')->insert([
            [
                'name' => 'الزمالك',
                'governorate_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);


        DB::table('cities')->insert([
            [
                'name' => 'القاهرة الجديده',
                'governorate_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'com_code' => 1,
            ],
        ]);


        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};