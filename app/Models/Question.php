<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    public function courses()
    {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function repliedBy()
    {
        return $this->belongsTo('App\Models\User', 'answered_by', 'id');
    }
}
