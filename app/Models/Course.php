<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function syllabus()
    {
        return $this->belongsTo(Syllabus::class, 'syllabus_id', 'id');
    }

    public function outlines()
    {
        return $this->hasOne(CourseOutline::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'course_id', 'id');
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
