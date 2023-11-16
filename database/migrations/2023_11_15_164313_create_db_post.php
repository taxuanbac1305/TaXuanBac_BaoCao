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
    public function up() : void
    {
        Schema::create('db_post', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('cate_post_id')->nullable();
            $table->string("title");
            $table->string("slug");
            $table->text("content");
            $table->text("description");
            $table->string("meta_keywords");
            $table->string("meta_desc");
            $table->string("image");
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
        Schema::dropIfExists('db_post');
    }
};
