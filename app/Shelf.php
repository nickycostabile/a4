<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
	/**
	 * Relationship Method
	 */
    public function all_books() {
    	
		return $this->belongsToMany('App\allBooks')->withTimestamps();
		
	}

	/**
	 * Shelves for Dropdown > Create a Book
	 */
	public static function getShelvesForCheckboxes() {

    $shelves = Shelf::orderBy('name','ASC')->get();

    $shelvesForCheckboxes = [];

    foreach($shelves as $shelf) {
        $shelvesForCheckboxes[$shelf['id']] = $shelf->name;
    }

    return $shelvesForCheckboxes;

}

}
