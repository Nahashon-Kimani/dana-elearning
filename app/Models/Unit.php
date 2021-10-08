<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function lessons()
    {
        return $this->hasMany(InstructorUnit::class, 'units_id', 'id');
    }
    public function syllabi()
    {
        return $this->hasOne(Syllabus::class);
    }
    public function schemes()
    {
        return $this->hasOne(Scheme::class);
    }
}
