<?php

namespace App\Http\Livewire\Contacts;

use App\Models\Contact;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class Table extends LivewireDatatable
{
    public $model = Contact::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('Id'),
            Column::name('user.id')
                ->label('User'),
            Column::name('upload_file.id')
                ->label('CVS File'),
            Column::name('name'),
            Column::name('email'),
            DateColumn::name('birthdate')
                ->label('Birth of Date')
                ->format('Y F j'),
            Column::name('phone'),
            Column::name('address'),
            NumberColumn::name('credit_card'),
            Column::name('franchise'),
        ];
    }
}