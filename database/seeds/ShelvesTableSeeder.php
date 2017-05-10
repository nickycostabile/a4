<?php

use Illuminate\Database\Seeder;

use App\Shelf;

class ShelvesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shelves = ['read', 'currently reading', 'to read'];

        foreach($shelves as $shelfName) {
            $shelves = new Shelf();
            $shelves->name = $shelfName;
            $shelves->save();
        }
    }
}
