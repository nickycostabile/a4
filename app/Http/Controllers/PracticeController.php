<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\allBooks;
use App\Writer;

class PracticeController extends Controller {

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