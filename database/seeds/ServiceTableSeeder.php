<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Service::create([
            'title' => 'Henna',
            'description' => 'Henna e desinger',
            'value' => 20.20,

        ]);
    }
}
