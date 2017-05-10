<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\allBooks;
use App\Writer;

class PracticeController extends Controller {

    /**
     * test shelves pivot
     */
    public function practice7() {
        $books = allBooks::with('shelves')->get();

        foreach($books as $book) {
            dump($book->title.' is tagged with: ');
            foreach($book->shelves as $shelf) {
                dump($shelf->name.' ');
            }
        }
    }

 

    /**
     * practice 6 read querying relationships
     */
    public function practice6() {

        # Get the first book as an example
        $book = allBooks::first();

        # Get the author from this book using the "author" dynamic property
        # "author" corresponds to the the relationship method defined in the Book model
        $writer = $book->writer;

        # Output
        dump($book->title.' was written by '.$writer->first_name.' '.$writer->last_name);
        dump($book->toArray());
    }

    /**
     * practice 5
     */
    public function practice5() {
        $books= allBooks::all();
        dump($books);
    }

    /**
     * practice 4
     */
    public function practice4() {
       # First get a book to update
        $books = allBooks::where('writer', 'LIKE', '%Harper%')->get();
        if(!$allBooks) {
            dump("Book not found, can't update.");
        }
        else {
            foreach($books as $key => $allBooks) {
                # Change some properties
                $allBooks->title = 'To Really Kill a Mockingbird';
                # Save the changes
                $allBooks->save();
            }
            dump('Update complete; check the database to confirm the update worked.');
        }
    }

    /**
     * practice 3
     */
    public function practice3() {
        $writer = new Writer();
        $writers = $writer->all();
        dump($writers->toArray());
    }

	/**
	 * practice 2
	 */
	public function practice2() {
		$book = new allBooks();
		$books = $book->all();
		dump($books->toArray());
	}

	/**
	 * practice 1
	 */
	public function practice1() {
        dump('This is the first example.');
    }
    
	/**
	 * /practice/{n?}
	 */
	public function index($n = null) {
        # If no specific practice is specified, show index of all available methods
        if(is_null($n)) {
            foreach(get_class_methods($this) as $method) {
                if(strstr($method, 'practice'))
                echo "<a href='".str_replace('practice','/practice/',$method)."'>" . $method . "</a><br>";
            }
        }
        # Otherwise, load the requested method
        else {
            $method = 'practice'.$n;
            if(method_exists($this, $method))
            return $this->$method();
            else
            dd("Practice route [{$n}] not defined");
        }
    }


} /* end class PracticeController