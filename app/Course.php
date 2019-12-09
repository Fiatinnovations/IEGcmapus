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

    public function scopeFirstuni($query)
    {
        return $query->where('university_id', 1);
    }

    public function scopeSeconduni($query)
    {
        return $query->where('university_id', 2);
    }

    public function scopeThirduni($query)
    {
        return $query->where('university_id', 3);
    }
}
