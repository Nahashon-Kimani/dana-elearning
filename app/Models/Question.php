<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

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
