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
        Schema::create('db_contact', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('title');
            $table->string('content');
            $table->unsignedInteger('replay_id')->default(0);
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('update_by')->nullable();
            $table->timestamps();
            $table->unsignedTinyInteger('status')->default(2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('db_contact');
    }
};
