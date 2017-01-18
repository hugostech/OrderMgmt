<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->timestamps();
            $table->date('order_create_at')->nullable();
            $table->float('total');
            $table->float('feight')->nullable();
            $table->enum('shipping_method',[0,1])->default(0);
            $table->string('shipping_name')->nullable();
            $table->string('shipping_company')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_postcode')->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('payment_method');
            $table->string('currency_code');
            $table->enum('payment_status',[0,1])->default(0);
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
