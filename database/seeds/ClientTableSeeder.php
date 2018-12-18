<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        App\Client::create([
            'name' => 'Ana Maria Braga',
            'phone' => 35712199,
            'adress' => 'Rua Maria Honoria',
        ]);
    }
}
