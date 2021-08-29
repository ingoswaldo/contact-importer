<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UploadFileControllerTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
    }

    public function test_table_component_can_be_rendered_on_upload_files_index_page()
    {
        $this->actingAs($this->user)
            ->get(route('upload-files.index'))
            ->assertSeeLivewire('upload-files.table');
    }

    public function test_create_component_can_be_rendered_on_upload_files_index_page()
    {
        $this->actingAs($this->user)
            ->get(route('upload-files.index'))
            ->assertSeeLivewire('upload-files.create');
    }
}
