<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InsuranceCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InsuranceCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InsuranceCompany::factory()->count(25)->create();
    }
}