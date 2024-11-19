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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_code')->unique();
            $table->string('name', 50);
            $table->string('national_id', 14);
            $table->string('mobile', 20);
            $table->string('alt_mobile', 20);
            $table->string('address', 300);
            $table->string('emergency_contact', 300)->nullable();
            $table->string('email', 50)->unique()->nullable();
            $table->date('date_of_birth');
            $table->tinyInteger('gender')->comment('1:Male,2:Female');
            $table->foreignId('governorate_id')->references('id')->on('governorates')->onUpdate('cascade');
            $table->foreignId('city_id')->references('id')->on('cities')->onUpdate('cascade');
            $table->foreignId('nationality_id')->references('id')->on('nationalities')->onUpdate('cascade');
            $table->foreignId('blood_type_id')->nullable()->references('id')->on('blood_types')->onUpdate('cascade');
            $table->text('medical_history')->nullable();
            $table->tinyInteger('are_previous_surgeries')->nullable()->comment('  1 نعم | 0 لا::: هل يوجد عمليات جراحية سابقه');
            $table->text('previous_surgeries_details');
            $table->tinyInteger('Do_you_take_therapy')->nullable()->comment('  1 نعم | 0 لا::: هل تاخذ علاج مزمن');
            $table->text('take_therapy_details');
            $table->tinyInteger('Do_you_chronic_diseases')->nullable()->comment('  1 نعم | 0 لا::: هل يوجد امراض مزمنه');
            $table->text('chronic_diseases_details');
            $table->text('notes');
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
        Schema::dropIfExists('patients');
    }
};
