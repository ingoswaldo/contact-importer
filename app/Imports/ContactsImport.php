<?php

namespace App\Imports;

use App\Helpers\Validators\AddressValidator;
use App\Helpers\Validators\BirthdateValidator;
use App\Helpers\Validators\CreditCardValidator;
use App\Helpers\Validators\NameValidator;
use App\Helpers\Validators\PhoneValidator;
use App\Models\Contact;
use App\Models\UploadFile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ContactsImport implements ToModel, WithValidation, WithHeadingRow, ShouldQueue, WithChunkReading
{

    private $uploadFile;

    public function __construct(UploadFile $uploadFile)
    {
        $this->uploadFile = $uploadFile;
    }

    /**
     * @param array $row
     *
     * @return Model|null
     */
    public function model(array $row)
    {
        $uploadFile  = $this->uploadFile;
        $columnNames = $uploadFile->column_names;

        return new Contact([
            'user_id'        => Auth::id(),
            'upload_file_id' => $uploadFile->id,
            'name'           => $row[ $columnNames[ 'name' ] ],
            'email'          => $row[ $columnNames[ 'email' ] ],
            'birthdate'      => $row[ $columnNames[ 'birthdate' ] ],
            'phone'          => $row[ $columnNames[ 'phone' ] ],
            'address'        => $row[ $columnNames[ 'address' ] ],
            'credit_card'    => $row[ $columnNames[ 'credit_card' ] ],
            'franchise'      => $row[ $columnNames[ 'franchise' ] ],
        ]);
    }

    public function rules(): array
    {
        $rules       = [];
        $columnNames = $this->uploadFile->column_names;

        foreach ($columnNames as $key => $columnName) {
            $closure = $this->validateClosure($key);

            if ( isset($closure) ) {
                $rules[ $columnName ] = $closure;
            }
        }

        return $rules;
    }

    public function chunkSize(): int
    {
        return 500;
    }

    private function setLog(string $string)
    {
        $this->uploadFile->log = $string;
        $this->uploadFile->save();
    }

    /**
     * @param $key
     * @return mixed
     */
    private function getNewValidatorInstance($key)
    {
        $className = $this->getClassNameWithNamespace($key);

        if ( is_null($className) ) {
            return null;
        }

        return new $className;
    }

    private function validateClosure($key)
    {
        if ( $this->isBasicValidation($key) ) {
            return $this->basicValidators()[ $key ];
        }

        $validator = $this->getNewValidatorInstance($key);

        if ( isset($validator) ) {
            return function ($attribute, $value) use ($key, $validator) {
                if ( ! $validator->validate($value) ) {
                    $this->setLog("$key is not a valid value");
                }
            };
        }

        return null;
    }

    private function getClassNameWithNamespace($key): ?string
    {
        return $this->validatorClasses()[ $key ] ?? null;
    }

    private function validatorClasses(): array
    {
        return [
            'name'        => NameValidator::class,
            'birthdate'   => BirthdateValidator::class,
            'phone'       => PhoneValidator::class,
            'address'     => AddressValidator::class,
            'credit_card' => CreditCardValidator::class
        ];
    }

    public function isBasicValidation($key): bool
    {
        return isset($this->basicValidators()[ $key ]);
    }

    private function basicValidators(): array
    {
        return [
            'email' => Rule::in('email')
        ];
    }
}
