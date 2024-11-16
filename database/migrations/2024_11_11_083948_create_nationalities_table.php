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
        Schema::create('nationalities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });

        DB::table('nationalities')->insert([
            'name' => 'مصرى',            
            'com_code' => 1,
            'created_by' => 1,
        ]);

        DB::table('nationalities')->insert([
            'name' => 'سودانى',            
            'created_by' => 1,
            'com_code' => 1,
        ]);

        DB::table('nationalities')->insert([
            'name' => 'يمنى',            
            'created_by' => 1,
            'com_code' => 1,
        ]);

        DB::table('nationalities')->insert([
            'name' => 'تونسى',            
            'created_by' => 1,
            'com_code' => 1,
        ]);

        DB::table('nationalities')->insert([
            'name' => 'سعودى',            
            'created_by' => 1,
            'com_code' => 1,
        ]);

        DB::table('nationalities')->insert([
            'name' => 'جزائرى',            
            'created_by' => 1,
            'com_code' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nationalities');
    }
};