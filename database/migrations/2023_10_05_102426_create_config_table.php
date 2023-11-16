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
        Schema::create('db_config', function (Blueprint $table) {
            $table->id();
            $table->string("author");
            $table->string("email");
            $table->string("phone");
            $table->string("zalo");
            $table->string("facebook");
            $table->string("address");
            $table->string("youtube");
            $table->string("metadesc");
            $table->string("metakey");
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('update_by');
            $table->timestamps();
            $table->unsignedTinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('db_config');
    }
};
