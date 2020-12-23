<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded=[];

    protected $casts = [
        'answered_by' => 'array',
    ];


    public function answers(){
        return $this->hasMany('App\Answer');
    }
}
