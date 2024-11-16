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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->integer('doctor_code')->unique();
            $table->string('id_number',14);
            $table->string('name',50);
            $table->string('mobile',20);
            $table->string('address',300);
            $table->string('title',300);
            $table->string('email',300)->unique();
            $table->tinyInteger('gender')->comment('1:Male,2:Female');
            $table->integer('status')->default(1)->nullable();
            $table->foreignId('nationality_id')->references('id')->on('nationalities')->onUpdate('cascade');
            $table->foreignId('specialization_id')->references('id')->on('specializations')->onUpdate('cascade');
            $table->foreignId('section_id')->references('id')->on('sections')->onUpdate('cascade');
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
        Schema::dropIfExists('doctors');
    }
};