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
        Schema::create('single_radiology_services', function (Blueprint $table) {
            $table->id();
            $table->integer('single_radiology_services_code')->unique();
            $table->integer('patient_code')->comment('كود المريض');
            $table->integer('insurance_code')->comment('كود شركة التامين');
            $table->foreignId('radiology_services_id')->references('id')->on('radiology_services')->onUpdate('cascade')->comment('الاشعه');
            $table->decimal('price',10,2);
            $table->decimal('discount',10,2)->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('single_radiology_services');
    }
};