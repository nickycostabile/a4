<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    /**
	 * Relationship Method
	 */
    public function all_books() {
    	
    	# Writer has many Books
		# Define a one-to-many relationship.
		return $this->hasMany('App\allBooks');
		
	}

	/**
	 * Writers for Dropdown > Create a Book
	 */
	public static function getWritersForDropdown() {
		$writers = Writer::orderBy('last_name', 'ASC')->get();

		$writersForDropdown = [];
        foreach($writers as $writer) {
            $writersForDropdown[$writer->id] = $writer->last_name.', '.$writer->first_name;
        }

        return $writersForDropdown;
	}
}
