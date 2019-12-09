<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $fillable = ['name'];

    public function prospect()
    {
        return $this->belongsTo('App\Prospect');
    }
}
