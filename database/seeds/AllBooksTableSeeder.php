<?php

use Illuminate\Database\Seeder;

use App\allBooks;
use App\Writer;

class AllBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     # Load json file into PHP array
        $books = json_decode(file_get_contents(database_path().'/books.json'), True);
        
        $timestamp = Carbon\Carbon::now()->subDays(count($books));

        
        foreach($books as $title => $book) {

            $name = explode(' ', $book['writer']);
            $lastName = array_pop($name);

            # Find that author in the authors table
            $writer_id = Writer::where('last_name', '=', $lastName)->pluck('id')->first();
        
        
            # Set the created_at/updated_at for each book to be one day less than
            # the book before. That way each book will have unique timestamps.
            $timestampForThisBook = $timestamp->addDay()->toDateTimeString();
        
            allBooks::insert([
                'created_at' => $timestampForThisBook,
                'updated_at' => $timestampForThisBook,
                'title' => $title,
                'writer_id' => $writer_id,
                'published_date' => $book['published_date'],
                'isbn' => $book['isbn'],
                'cover_art' => $book['cover_art'],
            ]);
        }
    }
}
