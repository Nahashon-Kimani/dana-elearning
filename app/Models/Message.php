<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function askedBy()
    {
        return $this->belongsTo('App\Models\User', 'asked_by', 'id'); ;
    }

    public function repliedBy()
    {
        return $this->belongsTo('App\Models\User', 'replied_by', 'id'); ;
    }
}
