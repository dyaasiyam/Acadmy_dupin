<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    function teacher() {
        return $this->belongsTo(Teacher::class);
    }
    public function availableTimes()
    {
        return $this->hasMany(AvailableTime::class, 'course_id');
    }


    function students() {
        return $this->belongsToMany(User::class, 'student_courses');
    }

    function getNameAttribute() {
        return $this->{'name_'.app()->currentLocale()};
    }
}
