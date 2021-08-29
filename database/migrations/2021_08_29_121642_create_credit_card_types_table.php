<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditCardTypesTable extends Migration
{
    /**
     * Run the migrations.
     *`
     * @return void
     */
    public function up()
    {
        Schema::create('credit_card_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('inn_ranges');
            $table->string('length_ranges');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_card_types');
    }
}
