<?php

use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')->insert([
            ['id' => 1, 'name' => 'DNI'],
            ['id' => 2, 'name' => 'Pasaporte'],
            ['id' => 3, 'name' => 'Carné de extranjería'],
        ]);
    }
}
