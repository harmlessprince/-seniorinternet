<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
     
    public function lecturers()
    {
        return $this->hasMany(Lecturer::class);
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
