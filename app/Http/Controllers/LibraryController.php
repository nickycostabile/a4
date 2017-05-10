<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\allBooks;
use App\Writer;
use App\Shelf;
use Session;

class LibraryController extends Controller {

	/**
	 * get /library/delete/{id}
	 * confirm book deletion
	 */
	public function confirmDelete($id) {
		$book = allBooks::find($id);

		if(!$book) {
            Session::flash('message', 'The book you requested was not found.');
            return redirect('/library');
        }

        return view('library.delete')->with([
			'book' => $book,
		]);
	}


	/**
	 * post 
	 * actually delete book 
	 */
	public function delete(Request $request) {

		$book = allBooks::find($request->id);

		if(!$book) {
            Session::flash('message', 'The book you requested was not found.');
            return redirect('/library');
        }

        $book->delete();

        Session::flash('message', $book->title.' was deleted.');
        return redirect('/library');

	}

	/**
	 * get /library/edit/{id}
	 */
	public function edit($id) {

		$book = allBooks::with('shelves')->find($id);

		$writer = Writer::find($id);
		$writersForDropdown = Writer::getWritersForDropdown();

		$shelvesforCheckBoxes = Shelf::getShelvesForCheckboxes();

		$shelvesForThisBook = [];
	    foreach($book->shelves as $shelf) {
	        $shelvesForThisBook[] = $shelf->name;
	    }

		if(is_null($book)) {
            Session::flash('message', 'The book you requested was not found.');
            return redirect('/library');
        }

		return view('library.edit')->with([
			'id' => $id,
			'book' => $book,
			'writer' => $writer,
			'writersForDropdown' => $writersForDropdown,
			'shelvesforCheckBoxes' => $shelvesforCheckBoxes,
			'shelvesForThisBook' => $shelvesForThisBook,
		]);
	}


	/**
	 * post /library/edit
	 * save edits
	 */
	public function saveEdits(Request $request) {

		$this->validate($request, [
		    'title' => 'required|min:3',
		    'published_date' => 'required|numeric|min:4',
		    'isbn' => 'required|numeric',
		    'cover_art' => 'required|url',
		    'writer_id' => 'not_in:0'
	    ]);

	    $book = allBooks::find($request->id);

	    $book->title = $request->title;
		$book->published_date = $request->published_date;
		$book->isbn = $request->isbn;
		$book->cover_art = $request->cover_art;
		$book->writer_id = $request->writer_id;
	
	    if($request->shelves) {
	        $shelves = $request->shelves;
	    } else {
	        $shelves = [];
	    }

	    $book->shelves()->sync($shelves);
		$book->save();

		Session::flash('message', "The changes made to ".$request->title." have been saved.");

		return redirect('library/'.$request->id);
	}


	/**
	 * get /library
	 */
	public function index(Request $request) {
		$books = allBooks::orderBy('title')->get();
    	return view('library.index')->with(['books' => $books]);
	}


	/**
	 * get /library/new
	 */
	public function createNewBook(Request $request) {

		$writersForDropdown = Writer::getWritersForDropdown();

        return view('library.create')->with([
            'writersForDropdown' => $writersForDropdown
        ]);

        return view('library.create');
	}


	/**
	 * post /library/new
	 */
	public function saveNewBook(Request $request) {

		$this->validate($request, [
		    'title' => 'required|min:3',
		    'published_date' => 'required|numeric|min:4',
		    'isbn' => 'required|numeric',
		    'cover_art' => 'required|url',
		    'writer_id' => 'not_in:0'
	    ]);


		$book = new allBooks();
		$book->title = $request->title;
		$book->published_date = $request->published_date;
		$book->isbn = $request->isbn;
		$book->cover_art = $request->cover_art;
		$book->writer_id = $request->writer_id;
		$book->save();

		Session::flash('message', $request->title.' has been added.');

		return redirect('/library');
	}


	/**
	 * get /library/{id}
	 */
	public function view($id) {
		$book = allBooks::with('shelves')->find($id);
		$book_id=$book['id'];

		$writer = Writer::find($id);
		
	    $shelvesForThisBook = [];
	    foreach($book->shelves as $shelf) {
	        $shelvesForThisBook = $shelf->name;
	    }

		return view('library.view')->with([
			'book' => $book,
			'writer' => $writer,
			'book_id' => $book_id,
			'shelvesForThisBook' => $shelvesForThisBook
			]);
	}


	/**
	 * get /search
	 */
	public function search(Request $request) {
		
		$searchResults = [];

		$searchTerm = $request->input('searchTerm', null);

		$book_id = 0;

		if($searchTerm) {
			# $booksRawData = file_get_contents(database_path().'/books.json');
			# $books = json_decode($booksRawData, true);
			# dd($books);

			$books = allBooks::all();

			   foreach($books as $book) {
			   		#$match = strtolower($title) == strtolower($searchTerm);
			   		#dump($books->title);
			   		$title = $book->title;
			   		$match = strtolower($title) == strtolower($searchTerm);
			   		#dump($match);

			   		if($match) {
			   			$searchResults[$title] = $book;	
			   			$book_id=$book['id'];
			   		}


			   }
		}

		return view('library.search')->with([
				'searchTerm' => $searchTerm,
				'searchResults' => $searchResults,
				'book_id' => $book_id
			]);
	}
}