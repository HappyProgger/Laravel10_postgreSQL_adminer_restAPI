<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LectureSeeder::class,
            Class_modelSeeder::class,
            StudentLectureSeeder::class,
            Class_LectureSeeder::class,
            LecturesPlanSeeder::class
        ]);
    }
}
