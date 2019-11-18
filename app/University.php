<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = ['name'];

    public function prospect()
    {
        return $this->hasMany('App\Prospect');
    }

    public function courses()
    {
        return $this->hasMany('App\Courses');
    }

}
