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
   
       /* allBooks::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Handmaids Tale',
            'writer' => 'Margaret Atwood',
            'published_date' => 1985,
            'isbn' => '038549081',
            'cover_art' => 'https://images.gr-assets.com/books/1489652243l/38447.jpg'
        ]);

        allBooks::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Bone Season',
            'writer' => 'Samantha Shannon',
            'published_date' => 2013,
            'isbn' => '1620401398',
            'cover_art' => 'https://images.gr-assets.com/books/1487337941l/30199429.jpg'
        ]);

        allBooks::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'To Kill a Mockingbird',
            'writer' => 'Harper Lee',
            'published_date' => 1960,
            'isbn' => '61120081',
            'cover_art' => 'https://images.gr-assets.com/books/1339392178l/37449.jpg'
        ]);

         allBooks::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Alchemist',
            'writer' => 'Paulo Coehlo',
            'published_date' => 1988,
            'isbn' => '61122416',
            'cover_art' => 'https://images.gr-assets.com/books/1483412266l/865.jpg'
        ]);

         allBooks::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Of Mice and Men',
            'writer' => 'John Steinbeck',
            'published_date' => 1937,
            'isbn' => '142000671',
            'cover_art' => 'https://images.gr-assets.com/books/1437235233l/890.jpg'
        ]); */


       # Load json file into PHP array
        $books = json_decode(file_get_contents(database_path().'/books.json'), True);
        
        $timestamp = Carbon\Carbon::now()->subDays(count($books));

        
        foreach($books as $title => $allBooks) {

            $name = explode(' ', $allBooks['writer']);
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
                'writer' => $allBooks['writer'],
                'published_date' => $allbooks['published_date'],
                'isbn' => $allBooks['isbn'],
                'cover_art' => $allBooks['cover_art'],
            ]);
        }

    }
}
