<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class allBooks extends Model
{

    /**
	 * Relationship Method
	 */
    public function writer() {

		# Book belongs to Writer
		# Define an inverse one-to-many relationship.
		return $this->belongsTo('App\Writer');
	
	
	}
}
