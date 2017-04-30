<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class allBooks extends Model
{

	protected $table = 'all_books';
    /**
	 * Relationship Method
	 */
    public function writer() {

		
		# Book belongs to Author
		# Define an inverse one-to-many relationship.
		return $this->belongsTo('App\Writer');
	
	}
}
