<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'class_id'
    ];

    public function class()
    {
        return $this->belongsTo(Class_model::class, );
    }

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class, 'student_lecture', 'student_id', 'lecture_id');
    }
}
