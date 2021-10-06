<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function courses()
    {
        return $this->belongsTo(Course::class, 'courses_id', 'id');
    }

    public function paidBy()
    {
        return $this->belongsTo(User::class, 'paid_by', 'id');
    }

    public function authorisedBy()
    {
        return $this->belongsTo(User::class, 'authorised_by', 'id');
    }
}
