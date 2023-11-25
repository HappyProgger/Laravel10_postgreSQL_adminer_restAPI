<?php

namespace Database\Seeders;

use App\Models\Class_model;
use App\Models\Lecture;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentLectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lectures = Lecture::all();
        $students = Student::all();

        $lectures->each(function ($lecture) use ($students) {
            $lecture->students()->attach(
                $students->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
