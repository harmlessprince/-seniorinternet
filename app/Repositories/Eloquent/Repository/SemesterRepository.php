<?php

namespace App\Repositories\Eloquent\Repository;

use App\Models\Semester;
class SemesterRepository extends BaseRepository
{
    public function __construct(Semester $model)
    {
        parent::__construct($model);
    }
}

