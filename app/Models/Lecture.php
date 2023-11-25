<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $fillable = [
        'theme',
        'description'

    ];

    public function classes()
    {
        return $this->belongsToMany(Class_model::class, 'lectures_plans', 'lecture_id', 'class_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_lecture', 'lecture_id', 'student_id');
    }
    public function classes_path_lection()
    {
        return $this->belongsToMany(Lecture::class,'class_lecture','lecture_id','class_id');
    }
}
