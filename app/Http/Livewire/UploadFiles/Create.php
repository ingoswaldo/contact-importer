<?php

namespace App\Http\Livewire\UploadFiles;

use Livewire\Component;

class Create extends Component
{
    public $uploadingFile = false;

    public $file;
    public $nameColumnName;
    public $emailColumnName;
    public $birthdateColumnName;
    public $phoneColumnName;
    public $addressColumnName;
    public $creditCardColumnName;
    public $franchiseColumnName;

    public function render()
    {
        return view('livewire.upload-files.create');
    }

    public function showUploadFileModal()
    {
        $this->uploadingFile = true;
    }

    public function hideUploadFileModal()
    {
        $this->uploadingFile = false;
    }
}
