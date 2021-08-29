<?php

namespace App\Helpers\Repository;

use App\Models\UploadFile;

class UploadFileRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new UploadFile());
    }
}