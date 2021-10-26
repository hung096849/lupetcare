<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('vocher_id')->nullable();
            $table->text('pet_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->char('payment_method')->comment('0:Cash, 1:Card')->default(0);
            $table->char('is_paid')->comment('0:Unpai, 1:Paid')->default(0);
            $table->char('status')->comment('0:In process, 1:Success')->default(0);
            // $table->text('items');
            // $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            // $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
