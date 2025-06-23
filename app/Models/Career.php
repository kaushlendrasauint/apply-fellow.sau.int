<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'application_id',
        'career_position',
        'career_employer',
        'career_address',
        'career_address',
        'career_datefrom',
        'career_dateTo',
        'career_salary',
    ];
}