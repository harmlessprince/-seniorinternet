<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'description', 'semester_id'];

    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
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
