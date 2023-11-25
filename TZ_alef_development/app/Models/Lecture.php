<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $fillable = ['topic', 'description'];

//    public function lectures_plan()
//    {
//        return $this->belongsToMany(LecturePlan::class, 'lecture_plan_lecture', 'lecture_id');
//    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    public function path_classes()
    {
        return $this->belongsToMany(Classes::class,'classes_lectures');
    }
    public function path_students()
    {
        return $this->belongsToMany(Student::class,'students_lectures','lecture_id');
    }
}
