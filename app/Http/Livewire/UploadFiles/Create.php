<?php

namespace App\Http\Livewire\UploadFiles;

use App\Helpers\Files\FileHelper;
use App\Helpers\Repository\UploadFileRepository;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $uploadingFile = false;

    public $file             = '';
    public $name_column_name    = '';
    public $email_column_name     = '';
    public $birthdate_column_name = '';
    public $phone_column_name    = '';
    public $address_column_name     = '';
    public $credit_card_column_name = '';
    public $franchise_column_name   = '';

    protected $rules = [
        'file'                    => 'required|file',
        'name_column_name'        => 'required|min:1|different:email_column_name|different:birthdate_column_name|different:phone_column_name|different:address_column_name|different:credit_card_column_name|different:franchise_column_name',
        'email_column_name'       => 'required|min:1|different:name_column_name|different:birthdate_column_name|different:phone_column_name|different:address_column_name|different:credit_card_column_name|different:franchise_column_name',
        'birthdate_column_name'   => 'required|min:1|different:name_column_name|different:email_column_name|different:phone_column_name|different:address_column_name|different:credit_card_column_name|different:franchise_column_name',
        'phone_column_name'       => 'required|min:1|different:name_column_name|different:email_column_name|different:birthdate_column_name|different:address_column_name|different:credit_card_column_name|different:franchise_column_name',
        'address_column_name'     => 'required|min:1|different:name_column_name|different:email_column_name|different:birthdate_column_name|different:phone_column_name|different:credit_card_column_name|different:franchise_column_name',
        'credit_card_column_name' => 'required|min:1|different:name_column_name|different:email_column_name|different:birthdate_column_name|different:phone_column_name|different:address_column_name|different:franchise_column_name',
        'franchise_column_name'   => 'required|min:1|different:name_column_name|different:email_column_name|different:birthdate_column_name|different:phone_column_name|different:address_column_name|different:credit_card_column_name',
    ];

    public function render()
    {
        return view('livewire.upload-files.create');
    }

    public function upload()
    {
        $this->resetErrorBag();
        $this->validate();

        $repository = new UploadFileRepository();
        $repository->create($this->getAttributes());

        $this->triggerUploadEvents();
        $this->hideUploadFileModal();
        $this->resetInputs();
    }

    public function showUploadFileModal()
    {
        $this->uploadingFile = true;
    }

    public function hideUploadFileModal()
    {
        $this->uploadingFile = false;
    }

    private function getAttributes(): array
    {
        return [
            'user_id'      => auth()->id(),
            'url'          => $this->uploadFileAndGetURL(),
            'status'       => 'On Hold',
            'column_names' => [
                'name'        => $this->name_column_name,
                'email'       => $this->email_column_name,
                'birthdate'   => $this->birthdate_column_name,
                'phone'       => $this->phone_column_name,
                'address'     => $this->address_column_name,
                'credit_card' => $this->credit_card_column_name,
                'franchise'   => $this->franchise_column_name,
            ]
        ];
    }

    private function uploadFileAndGetURL(): string
    {
        $fileName = $this->file->getClientOriginalName();
        $fileHelper = new FileHelper('upload-files', $fileName);

        $this->file->storeAs($fileHelper->getBasePath(), $fileName, 'public');

        return $fileHelper->getUrl();
    }

    private function triggerUploadEvents()
    {
        $this->emit('uploaded');
        $this->emit('refreshLivewireDatatable');
    }

    private function resetInputs()
    {
        $this->file = '';
        $this->name_column_name = '';
        $this->email_column_name = '';
        $this->birthdate_column_name = '';
        $this->phone_column_name = '';
        $this->address_column_name = '';
        $this->credit_card_column_name = '';
        $this->franchise_column_name = '';
    }
}
