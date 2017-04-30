<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    /**
	 * Relationship Method
	 */
    public function books() {
    	
		# Author has many Books
		# Define a one-to-many relationship.
		return $this->hasMany('App\allBooks');
	}
}
