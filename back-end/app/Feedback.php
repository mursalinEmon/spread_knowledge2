<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $guarded=[];
    protected $casts = [
        'wrong_ids' => 'array',
    ];

}
