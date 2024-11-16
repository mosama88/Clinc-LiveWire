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
        Schema::create('admin_panels', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 250);
            $table->tinyInteger('system_status')->default('1')->comment('واحد مفعل - صفر معطل');
            $table->string('photo_cover', 500)->nullable();
            $table->string('logo', 500)->nullable();
            $table->string('phones', 250);
            $table->string('address', 250);
            $table->string('email', 100);
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });


        DB::table('admin_panels')->insert([
            'id' => 1,
            'company_name' => 'طيبه',
            'system_status' => 1,
            'photo_cover' => null,
            'logo' => null,
            'phones' => '01550565699',
            'address' => '141 شارع الهرم محطة التعاون',
            'email' => 'info@teba.com',
            'created_by' => 1,
            'updated_by' => 1,
            'com_code' => 1,
            'created_at' => now(),
            'updated_at' => '2024-11-11 09:25:59',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_panels');
    }
};