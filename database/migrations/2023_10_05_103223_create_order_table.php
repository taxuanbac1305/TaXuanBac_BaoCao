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
        Schema::create('db_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('delivery_name');
            $table->string('delivery_gender');
            $table->string('delivery_email');
            $table->string('delivery_phone');
            $table->string('delivery_address');
            $table->string('note');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('update_by')->nullable();
            $table->timestamps();
            $table->unsignedTinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('db_order');
    }
};
