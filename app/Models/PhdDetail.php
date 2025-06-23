<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhdDetail extends Model
{
    protected $fillable = [
        'student_name',
        'phd_year',
        'university',
        'supervisors',
        'thesis_title',
        'application_id',
    ];
     public $timestamps = false;
}
