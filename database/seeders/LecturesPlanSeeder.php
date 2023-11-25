<?php

namespace Database\Seeders;

use App\Models\Class_model;
use App\Models\Lecture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LecturesPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lectures = Lecture::all();
        $classes = Class_model::all();

        function get_assoc_lectures($lectures){
            $mas_lectures = $lectures->random(rand(1, 3))->pluck('id')->toArray();
            $mas_id_orders_assoc = [];
            for ($i=0; $i <sizeof($mas_lectures); $i++){
                $mas_id_orders_assoc[$mas_lectures[$i]]= ['order' => $i+1];
            }
            return $mas_id_orders_assoc;

        }


        $classes->each(function ($class) use ($lectures) {
            $class->lectures()->attach(
                get_assoc_lectures($lectures)
            );
        });
    }
}
