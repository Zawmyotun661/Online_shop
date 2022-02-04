<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->date('order_date');
            $table->date('expected_delivery_date');
            $table->date('delivery_date');
            $table->string('customer_name');
            $table->string('facebook_name')->nullable();
            $table->string('customer_phone');
            $table->longText('address');
            $table->string('customer_type');
            $table->integer('total_cost');
            $table->integer('quantity');
            $table->string('clothing_type');
            $table->string('color');
            $table->string('payment_type');
            $table->integer('cost');
            $table->string('delivery_status');
            $table->string('payment_status');
            $table->string('delivery_fee');
            

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
        Schema::dropIfExists('packages');
    }
}
