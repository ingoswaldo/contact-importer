<?php

namespace App\Observers;

use App\Imports\ContactsImport;
use App\Models\UploadFile;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelExtensions;

class UploadFileObserver
{

    public function saved(UploadFile $uploadFile)
    {
        if ( $uploadFile->wasRecentlyCreated ) {
            Excel::import(new ContactsImport($uploadFile), $this->getFilePath($uploadFile));
        }
    }

    private function getFilePath(UploadFile $uploadFile)
    {
        $filePath = $uploadFile->url;

        if ( $this->isLocalDisk() ) {
            return public_path($uploadFile->url);
        }

        return $filePath;
    }

    private function isLocalDisk(): bool
    {
        $fileSystemDriver = $this->getFileSystemDriver();

        return $fileSystemDriver === 'local' || $fileSystemDriver === 'public';
    }

    private function getFileSystemDriver()
    {
        return env('FILESYSTEM_DRIVER', 'local');
    }
}
