<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->unsignedBigInteger('category_id');
            $table->string('image');
            $table->string('price')->nullable();
            $table->string('price_sale')->nullable();
            $table->text('detail')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(0);
            // ->comment("0: Active, 1: Deleted")
            $table->string('time')->nullable();
            $table->string('slug');
            $table->timestamp('delete_at');
            $table->foreign('category_id')->references('id')->on('categories_services')->onDelete('cascade');
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
        Schema::dropIfExists('services');
    }
}
