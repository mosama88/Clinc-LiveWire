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
        Schema::create('shift_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('نوع الشيفت: واحد صباحى و أثنين مسائى');
            $table->time('from_time');
            $table->time('to_time');
            $table->decimal('total_hours', 10, 2);
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });

        DB::table('shift_types')->insert([
            [
                'id' => 1,
                'name' => 'شفت 12 ساعه مساءآ',
                'from_time' => '12:00:00',
                'to_time' => '00:00:00',
                'total_hours' => '12.00',
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-19 18:36:39',
                'updated_at' => '2024-11-19 18:36:39',
            ],
            [
                'id' => 2,
                'name' => 'شفت 12 ساعه صباحآ',
                'from_time' => '00:00:00',
                'to_time' => '12:00:00',
                'total_hours' => '12.00',
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-19 18:37:10',
                'updated_at' => '2024-11-19 18:37:10',
            ],
            [
                'id' => 3,
                'name' => 'شفت صباحى 8 ساعات',
                'from_time' => '09:00:00',
                'to_time' => '17:00:00',
                'total_hours' => '8.00',
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-19 18:37:43',
                'updated_at' => '2024-11-19 18:37:43',
            ],
            [
                'id' => 4,
                'name' => 'شفت مسائى 8 ساعات',
                'from_time' => '13:00:00',
                'to_time' => '21:00:00',
                'total_hours' => '8.00',
                'created_by' => 1,
                'updated_by' => null,
                'com_code' => 1,
                'created_at' => '2024-11-19 18:38:19',
                'updated_at' => '2024-11-19 18:38:19',
            ],
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_types');
    }
};