<?php

namespace App\Repositories\Eloquent\Repository;
use App\Models\Lecturer;
class LecturerRepository extends BaseRepository
{
    public function __construct(Lecturer $model)
    {
        parent::__construct($model);
    }
}

