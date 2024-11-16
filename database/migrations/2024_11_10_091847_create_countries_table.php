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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });

        DB::table('countries')->insert([
            'name' => 'مصر',            
            'com_code' => 1,
            'created_by' => 1,
        ]);

        DB::table('countries')->insert([
            'name' => 'السودان',            
            'created_by' => 1,
            'com_code' => 1,
        ]);

        DB::table('countries')->insert([
            'name' => 'اليمن',            
            'created_by' => 1,
            'com_code' => 1,
        ]);

        DB::table('countries')->insert([
            'name' => 'تونس',            
            'created_by' => 1,
            'com_code' => 1,
        ]);

        DB::table('countries')->insert([
            'name' => 'السعودية',            
            'created_by' => 1,
            'com_code' => 1,
        ]);

        DB::table('countries')->insert([
            'name' => 'الجزائر',            
            'created_by' => 1,
            'com_code' => 1,
        ]);

        DB::table('countries')->insert([
            'name' => 'المغرب',            
            'created_by' => 1,
            'com_code' => 1,
        ]);

        DB::table('countries')->insert([
            'name' => 'الأمارات',            
            'created_by' => 1,
            'com_code' => 1,
        ]);

        DB::table('countries')->insert([
            'name' => 'البحرين',            
            'created_by' => 1,
            'com_code' => 1,
        ]);

        DB::table('countries')->insert([
            'name' => 'قطر',            
            'created_by' => 1,
            'com_code' => 1,
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};