<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('server_id');
            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('os_id');
            $table->string('name');
            $table->text('description');
            $table->integer('approved')->nullable();
            $table->float('price');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->on('users')->references('id')
                ->onDelete('cascade');
            $table->foreign('server_id')->on('servers')->references('id')
                ->onDelete('cascade');
            $table->foreign('category_id')->on('categories')->references('id')
                ->onDelete('cascade');
            $table->foreign('game_id')->on('games')->references('id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
