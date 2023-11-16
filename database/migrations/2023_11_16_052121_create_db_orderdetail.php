<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_orderdetail', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("order_id");
            $table->unsignedInteger("product_id");
            $table->string("product_name");
            $table->double("product_price");
            $table->double("product_quantity");
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
        Schema::dropIfExists('db_orderdetail');
    }
};
