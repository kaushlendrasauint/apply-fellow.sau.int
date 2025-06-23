<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaughtCourses extends Model
{
    protected $fillable = [
        'application_id',
        'type',
        'value',
    ];
}
