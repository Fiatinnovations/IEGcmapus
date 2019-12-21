<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    protected $fillable =
    [
        'title_id', 'user_id', 'gender_id', 'university_id', 'course_id',
        'first_name', 'last_name', 'email', 'avatar', 'dob', 'address',
        'slug', 'certificate', 'transcript', 'qualification_id', 'experience',
        'referee', 'passport', 'status_id', 'citizenship', 'admission_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    public function university()
    {
        return $this->belongsTo('App\University');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function title()
    {
        return $this->belongsTo('App\Title');
    }

    public function Admission()
    {
        return $this->belongsTo('App\Admission');
    }

    public function scopeConditional($query)
    {
        return $query->where('admission', 'Conditional');
    }

    public function scopeAccepted($query)
    {
        return $query->where('admission', 'Accepted');
    }
    
}
