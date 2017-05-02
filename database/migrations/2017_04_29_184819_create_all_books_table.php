<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_books', function (Blueprint $table) {

            $table->increments('id');

            $table->timestamps();

            $table->string('title');
            $table->integer('published_date');
            $table->integer('isbn');
            $table->string('cover_art');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('all_books');
    }
}
