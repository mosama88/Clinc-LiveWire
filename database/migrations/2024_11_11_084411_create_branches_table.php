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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('address', 1000);
            $table->string('phone', 255);
            $table->string('email', 50)->unique();
            $table->foreignId('governorate_id')->references('id')->on('governorates');
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->integer('status')->default(1)->nullable();
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });

        DB::table('branches')->insert([
            [
                'name' => 'فرع المهندسين',
                'address' => '40 ش العراق, متفرع من ش شهاب, المهندسين, الجيزة',
                'phone' => '02133368082',
                'email' => 'mohandessin@teba.com',
                'governorate_id' => 2,
                'city_id' => 1,
                'status' => 1,
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'name' => 'فرع المعادى',
                'address' => '8 شارع جلال مهران - متفرع من ش شلبى - البساتين - المعادي ',
                'phone' => '0227032086',
                'email' => 'maadi@teba.com',
                'governorate_id' => 1,
                'city_id' => 1,
                'status' => 1,
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'name' => 'فرع م نصر',
                'address' => '1 ميدان هشام بركات، تقاطع طريق النصر مع شارع الطيران، بمدينة نصر، القاهرة',
                'phone' => '0227614162',
                'email' => 'ncity@teba.com',
                'governorate_id' => 1,
                'city_id' => 1,
                'status' => 1,
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
        Schema::dropIfExists('branches');
    }
};
