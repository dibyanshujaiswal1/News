<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->string('post_name');
            $table->string('sub_title');
            $table->string('post_tag')->nullable();
            $table->string('main_image');
            $table->string('relatives_image')->nullable();
            $table->boolean('is_features')->nullable();
            $table->boolean('headline')->nullable();
            $table->boolean('mainnews')->nullable();
            $table->enum('status',[1,0])->default(1);
            $table->longText('description');
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
        Schema::dropIfExists('posts');
    }
}
