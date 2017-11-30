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
        $this->call(InstanceSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(DocumentSeeder::class);
    }
}
