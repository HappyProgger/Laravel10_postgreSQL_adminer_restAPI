<?php

namespace Database\Seeders;
use App\Models\Class_model;
use App\Models\Lecture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Class_LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


//
//        $lectures->each(function ($lecture) use ($classes) {
//            $lecture->class_list()->attach(
//                $classes->random(rand(1, 3))->pluck('id')->toArray()
//            );
//        });
//



        $lectures = Lecture::all();
        $classes = Class_model::all();



        $lectures->each(function ($lecture) use ($classes) {
            $lecture->classes_path_lection()->attach(
                $classes->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

    }

}
