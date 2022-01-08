<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Get the lecturers's full name.
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
    public function firstSemesterCourses()
    {
        return $this->hasMany(Course::class)->whereHas('semester', function ($query)
        {
            $query->where('slug', Semester::FIRST_SEMESTER);
        });
    }
    public function secondSemesterCourses()
    {
        return $this->hasMany(Course::class)->whereHas('semester', function ($query)
        {
            $query->where('slug', Semester::SECOND_SEMESTER);
        });
    }
}
