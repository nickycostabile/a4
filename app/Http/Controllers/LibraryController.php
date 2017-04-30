<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\allBooks;
use App\Writer;

class LibraryController extends Controller {

	/**
	 * get /books/{id}
	 */
	public function view($id) {
		$book = allBooks::find($id);
		if(!$book) {
			echo 'not a book';
		}
		return view('library.view')->with([
			'book' => $book,
			]);
	}

	/**
	 * get /search
	 */

	public function search(Request $request) {
		$searchResults = [];

		$searchTerm = $request->input('searchTerm', null);

		if($searchTerm) {
			 $booksRawData = file_get_contents(database_path().'/books.json');

			 $books = json_decode($booksRawData, true);

			  foreach($books as $title => $book) {
			  	if($match) {
	                $searchResults[$title] = $book;
	            }
			  }

		}

		return view('library.search')->with([
	        'searchTerm' => $searchTerm,
	        'searchResults' => $searchResults
	    ]);
	}
}