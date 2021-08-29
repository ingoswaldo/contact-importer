<?php

namespace App\Helpers\Files;

use Illuminate\Support\Facades\Storage;

class FileHelper
{
    private $id;

    private $resource;

    private $name;

    public function __construct(string $resource, string $name)
    {
        $this->id = uniqid();
        $this->resource = $resource;
        $this->name = $name;
    }

    public function getBasePath(): string
    {
        return "$this->resource/$this->id";
    }

    public function getFullPath(): string
    {
        return $this->getBasePath(). "/$this->name";
    }

    public function getUrl(): string
    {
        return Storage::url($this->getFullPath());
    }
}