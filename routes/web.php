<?php

	/**
	 * Admin Confirm Delete
	 */
	Route::get('/library/delete/{id?}', 'LibraryController@confirmDelete');

	/**
	 * Admin Final Delete
	 */
	Route::post('/library/delete', 'LibraryController@delete');

	/**
	  * View Library of Books
	  * /library
	*/ 
	Route::get('/library', 'LibraryController@index');

	/**
	 * Admin Create A Book
	 */
	Route::get('/library/create', 'LibraryController@createNewBook');

	/**
	 * Admin Save New Book
	 */
	Route::post('/library/create', 'LibraryController@saveNewBook');

	/**
	 * Admin Edit A Book
	 */
	Route::get('/library/edit/{id?}', 'LibraryController@edit');

	/**
	 * Admin Save Edits To A Book
	 */
	Route::post('/library/edit', 'LibraryController@saveEdits');

	/**
	 * Get Individual Book by id
	 */
	Route::get('/library/{id?}', 'LibraryController@view');

	/**
	 * Admin Search For Book
	 */
	Route::get('/search', 'LibraryController@search');





	Route::get('/', function () {
	    return view('welcome');
	});

	/**
	* Practice Route
	*/
	Route::any('/practice/{n?}', 'PracticeController@index');

	/**
	 * Drop and Create A4 Database
	 */
	if(App::environment('local')) {

	    Route::get('/drop', function() {

	        DB::statement('DROP database a4');
	        DB::statement('CREATE database a4');

	        return 'Dropped a4; created a4.';
	    });

	    /**
		* Log Viewer for Local Environment
		*
		*/
		if(config('app.env') == 'local') {
		    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
		}


		/**
		 * Debug Check Database
		 */
		Route::get('/debug', function() {

			echo '<pre>';

			echo '<h1>Environment</h1>';
			echo App::environment().'</h1>';

			echo '<h1>Debugging?</h1>';
			if(config('app.debug')) echo "Yes"; else echo "No";

			echo '<h1>Database Config</h1>';
		    	echo 'DB defaultStringLength: '.Illuminate\Database\Schema\Builder::$defaultStringLength;

			echo '<h1>Test Database Connection</h1>';
			try {
				$results = DB::select('SHOW DATABASES;');
				echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
				echo "<br><br>Your Databases:<br><br>";
				print_r($results);
			}
			catch (Exception $e) {
				echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
			}

			echo '</pre>';

		});

}; #end local env


















