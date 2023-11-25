<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_model extends Model
{
    protected $table = 'classes';
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function students()
    {
        return $this->HasMany(Student::class, 'class_id', 'id');
    }

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class, 'lectures_plans', 'class_id', 'lecture_id')
            ->withPivot('order')
            ->orderBy('order');
    }

    public function class_lecture()
    {
        return $this->belongsToMany(Lecture::class,'class_lecture','class_id', 'lecture_id');
    }
}
