<?php

namespace App\Http\Livewire\UploadFiles;

use App\Models\UploadFile;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\JsonColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;

class Table extends LivewireDatatable
{
    public $model = UploadFile::class;

    public function columns(): array
    {
        return [
            NumberColumn::name('id')
                ->label('Id'),
            Column::name('user.id')
                ->label('User'),
            Column::name('url'),
            JsonColumn::callback('column_names', function ($value){
                return join(', ', json_decode($value, true));
            })->label('Column Names'),
            Column::name('status'),
            Column::name('log'),
        ];
    }
}