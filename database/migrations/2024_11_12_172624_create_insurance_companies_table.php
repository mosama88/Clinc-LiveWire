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
        Schema::create('insurance_companies', function (Blueprint $table) {
            $table->id();
            $table->integer('company_code')->nullable()->comment('كود الشركه التلقائي لايتغير');
            $table->string('name', 255);
            $table->text('address', 1000);
            $table->string('email', 50)->unique();
            $table->string('work_phone', 20);
            $table->string('contact_person', 100)->comment('الشخص المسؤول عن التواصل');
            $table->string('mobile_person', 20);
            $table->text('agreement_details')->comment('تفاصيل الاتفاقية');
            $table->decimal('discount_rate',10,2)->comment('نسبة الخصم الممنوحة');
            $table->foreignId('governorate_id')->references('id')->on('governorates');
            $table->integer('status')->default(1)->nullable();
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
        Schema::dropIfExists('insurance_companies');
    }
};