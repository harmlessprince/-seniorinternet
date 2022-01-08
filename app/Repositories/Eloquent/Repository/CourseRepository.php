<?php

namespace App\Repositories\Eloquent\Repository;
use App\Models\Course;
class CourseRepository extends BaseRepository
{
    public function __construct(Course $model)
    {
        parent::__construct($model);
    }
}

