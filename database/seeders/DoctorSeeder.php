<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::factory()->count(25)->create();
        $Appointments = Appointment::all();

        Doctor::all()->each(function ($doctor) use ($Appointments) {
            $doctor->doctorappointments()->attach(
            $Appointments->random(rand(1,7))->pluck('id')->toArray()
            );
        });

    }
}
