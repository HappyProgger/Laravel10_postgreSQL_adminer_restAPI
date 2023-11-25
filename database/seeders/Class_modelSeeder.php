<?php

namespace Database\Seeders;

use App\Models\Class_model;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Class_modelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Class_model::factory()->count(6)->create();
        Class_model::factory()
            ->count(6)
            ->create()
            ->each(function ($class) {
                $class->students()->saveMany(
                    Student::factory()->count(5)->make()
                );
            });

    }
}
