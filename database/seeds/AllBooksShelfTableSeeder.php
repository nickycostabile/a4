<?php

use Illuminate\Database\Seeder;

use App\allBooks;
use App\Shelf;

class AllBooksShelfTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books =[
        	'The Handmaid\'s Tale' => ['currently reading'],
 	        'The Bone Season' => ['read'],
	        'To Kill a Mockingbird' => ['read'],
	        'The Alchemist' => ['to read'],
	        'Of Mice and Men' => ['read']
    	];

	    # Now loop through the above array, creating a new pivot for each book to tag
	    foreach($books as $title => $shelves) {

	        # First get the book
	        $book = allBooks::where('title','like',$title)->first();

	        # Now loop through each tag for this book, adding the pivot
	        foreach($shelves as $shelfName) {
	            $shelf = Shelf::where('name','LIKE',$shelfName)->first();

	            # Connect this tag to this book
	            $book->shelves()->save($shelf);
	        }

	    }
    }
}
