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
            $table->string('order_code')->nullable();
            // $table->integer('vocher_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->tinyInteger('payment_method')->comment('0:Cash, 1:Card')->default(0);
            $table->tinyInteger('is_paid')->comment('0:Unpai, 1:Paid')->default(0);
            $table->dateTime('date');
            $table->bigInteger('total_price')->nullable();
            $table->bigInteger('pile')->nullable();
            $table->tinyInteger('status')->comment('0:In process, 1:Success')->default(0);
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
