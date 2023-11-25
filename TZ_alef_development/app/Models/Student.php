<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['classes_id','name','email'];

//    protected $guarded = ['email'];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'classes_id');
    }

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class, 'students_lectures');
    }

}
