<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllBooksShelfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_books_shelf', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->integer('all_books_id')->unsigned();
            $table->integer('shelf_id')->unsigned();

            # Make foreign keys
            $table->foreign('all_books_id')->references('id')->on('all_books');
            $table->foreign('shelf_id')->references('id')->on('shelves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('all_books_shelf');
    }
}
