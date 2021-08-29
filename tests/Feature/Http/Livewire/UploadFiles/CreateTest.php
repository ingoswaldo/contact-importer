<?php

namespace Tests\Feature\Http\Livewire\UploadFiles;

use App\Http\Livewire\UploadFiles\Create;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
    }

    public function test_user_can_upload_a_csv_file()
    {
        $this->actingAs($this->user);

        $file = UploadedFile::fake()->create('contacts.csv');

        Livewire::test(Create::class)
            ->set('file', $file)
            ->set('name_column_name', 'n')
            ->set('email_column_name', 'e')
            ->set('birthdate_column_name', 'b')
            ->set('phone_column_name', 'p')
            ->set('address_column_name', 'a')
            ->set('credit_card_column_name', 'c')
            ->set('franchise_column_name', 'f')
            ->call('upload')
            ->assertHasNoErrors();

        $this->assertDatabaseCount('upload_files', 1);
    }

    public function test_user_can_not_upload_a_csv_file_without_fields_required()
    {
        $this->actingAs($this->user);

        Livewire::test(Create::class)
            ->call('upload')
            ->assertHasErrors();
    }
}
