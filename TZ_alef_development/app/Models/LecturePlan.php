<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturePlan extends Model
{
    protected $table = 'lecture_plan';
    use HasFactory;
    protected $fillable = [];

//    public function class()
//    {
//        return $this->belongsTo(Classes::class, 'id', "class_id");
//    }

//    public function lectures()
//    {
//        return $this->belongsToMany(Lecture::class,"lecture_plan_lecture", 'lecture_plan_id');
//    }
}
