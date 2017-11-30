<?php

use Illuminate\Database\Seeder;

class InstanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instance_statuses')->insert([
            ['id' => 1, 'name' => 'Pendiente'],
            ['id' => 2, 'name' => 'En marcha'],
            ['id' => 3, 'name' => 'Finalizado'],
        ]);

        DB::table('instance_types')->insert([
            ['id' => 1, 'name' => 'Público'],
            ['id' => 2, 'name' => 'Privado'],
        ]);
    }
}
