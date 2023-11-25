<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassLecture extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'lecture_id',
    ];

    public function class()
    {
        return $this->belongsTo(Class_model::class);
    }
    public function lecture_list()
    {
        return $this->belongsToMany(Lecture::class);
    }


}
