<?php

namespace Database\Seeders;

use Database\Factories\LectureFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lecture;
use function Laravel\Prompts\table;

//use App\Models\Lecture;

class LectureSeeder extends Seeder
{
    /**
     *
     * Run the database seeds.
     */
    public function run(): void
    {
        Lecture::factory()->count(10)->create();



      }
}
