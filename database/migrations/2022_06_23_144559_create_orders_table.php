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

            $table->float('total', 6, 2);
            $table->string('customer_address', 255);
            $table->string('customer_name', 30);
            $table->string('customer_surname', 30);
            $table->bigInteger('customer_phone');
            $table->mediumText('special_request')->nullable();
            $table->boolean('payment_approval');

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
