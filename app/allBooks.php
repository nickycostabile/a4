<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class allBooks extends Model
{

    /**
	 * Relationship Methods
	 */
    public function writer() {

		# Book belongs to Writer
		return $this->belongsTo('App\Writer');
		
	}

	public function shelves() {

	    return $this->belongsToMany('App\Shelf')->withTimestamps();
	
	}
}
