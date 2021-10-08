<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Syllabus extends Model
{
    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

   
    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function units()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
