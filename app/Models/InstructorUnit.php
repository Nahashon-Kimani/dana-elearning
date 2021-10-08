<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstructorUnit extends Model
{
    use HasFactory, SoftDeletes;

    public function users()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');;
    }

    public function units()
    {
        return $this->belongsTo(Unit::class, 'units_id', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    // public function lessons()
    // {
    //     return $this->hasMany(Lesson::class);
    // }
}
