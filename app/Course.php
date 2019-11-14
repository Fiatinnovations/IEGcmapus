<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'university_id'];

    public function prospect()
    {
        return $this->belongsTo('App\Prospect');
    }

    public function university()
    {
        return $this->belongsTo('App\University');
    }
}
