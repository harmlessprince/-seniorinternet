<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email'];
    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }
    public function firstSemesterCourses()
    {
        return $this->belongsToMany(Course::class)->whereHas('semester', function ($query)
        {
            $query->where('slug', Semester::FIRST_SEMESTER);
        });
    }
    public function secondSemesterCourses()
    {
        return $this->belongsToMany(Course::class)->whereHas('semester', function ($query)
        {
            $query->where('slug', Semester::SECOND_SEMESTER);
        });
    }
    /**
     * Get the students's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
