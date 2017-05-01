<?php

use Illuminate\Database\Seeder;

use App\Writer;

class WritersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        # Array of writer data to add
	    $writers = [
	        ['Margaret', 'Atwood', 'http://margaretatwood.ca/'],
	        ['Samantha', 'Shannon', 'http://samantha-shannon.blogspot.com/'],
	        ['Harper', 'Lee', 'http://tokillamockingbird.com'],
	        ['Paulo', 'Coehlo', 'http://paulocoelhoblog.com/'],
	        ['John', 'Steinbeck', 'https://en.wikipedia.org/wiki/John_Steinbeck']
	    ];

	    $timestamp = Carbon\Carbon::now()->subDays(count($writers));

	    # Loop through each writer, adding them to the database
	    foreach($writers as $writer) {

	        # Set the created_at/updated_at for each book to be one day less than
	        # the book before. That way each book will have unique timestamps.
	        $timestampForThisWriter = $timestamp->addDay()->toDateTimeString();
	        
	        Writer::insert([
	            'created_at' => $timestampForThisWriter,
	            'updated_at' => $timestampForThisWriter,
	            'first_name' => $writer[0],
	            'last_name' => $writer[1],
	            'website' => $writer[2],
	        ]);
	    }



    }
}
