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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->timestamps();
        });

        DB::table('appointments')->insert(
            [
                ['name' => 'السبت'],
                ['name' => 'الأحد'],
                ['name' => 'الاثنين'],
                ['name' => 'الثلاثاء'],
                ['name' => 'الاربعاء'],
                ['name' => 'الخميس'],
                ['name' => 'الجمعه'],
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
