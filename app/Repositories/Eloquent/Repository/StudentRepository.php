<?php

namespace App\Repositories\Eloquent\Repository;
use App\Models\Student;
class StudentRepository extends BaseRepository
{
    public function __construct(Student $model)
    {
        parent::__construct($model);
    }
}

