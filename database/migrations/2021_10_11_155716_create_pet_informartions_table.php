<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetInformartionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_informartions', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger('customer_id')->nullable();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('weight')->nullable();
            $table->string('gender')->nullable();
            // $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet_informartions');
    }
}
