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
            $table->foreignId('user_id')->references('id')->on('users')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('category_id')->references('id')->on('categories')
                   ->onDelete('cascade')->onUpdate('cascade');
            $table->string('name',128)->unique();
            $table->string('slug',128)->unique();
            $table->mediumText('excerpt')->nullable();
            $table->mediumText('description');
            $table->enum('status', ['PUBLISHER', 'DRAFT'])->default('DRAFT');
            // $table->string('file',128)->nullable();



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
