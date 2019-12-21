<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = ['name'];

    public function prospect()
    {
        return $this->belongsTo('App\Prospect');
    }

    public function scopePending($query)
    {
        return $query->where('admission_id', 1);
    }

    public function scopeConditional($query)
    {
        return $query->where('admission_id', 2);
    }

    public function scopeAccepted($query)
    {
        return $query->where('admission_id', 3);
    }

   
    
}
