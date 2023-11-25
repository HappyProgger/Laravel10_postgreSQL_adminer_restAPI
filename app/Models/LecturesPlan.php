<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturesPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'lecture_id',
        'order',
    ];

    public function class()
    {
        return $this->belongsTo(Class_model::class);
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }
}
