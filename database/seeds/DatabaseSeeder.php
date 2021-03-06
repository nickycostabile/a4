<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WritersTableSeeder::class);
        $this->call(ShelvesTableSeeder::class);
        $this->call(AllBooksTableSeeder::class);
        $this->call(AllBooksShelfTableSeeder::class);
    }
}
