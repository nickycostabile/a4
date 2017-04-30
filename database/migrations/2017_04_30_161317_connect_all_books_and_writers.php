<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectAllBooksAndWriters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        /*
        Schema::table('all_books', function (Blueprint $table) {

            $table->integer('writer_id')->unsigned();

            $table->foreign('writer_id')->references('id')->on('writers');

        }); */
    }

    public function down()
    { 
        /*
        Schema::table('all_books', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('all_books_writer_id_foreign');

            $table->dropColumn('writer_id');
        }); 
        */
    }
}
