<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\Artisan::call('doctrine:schema:drop --force');
        \Illuminate\Support\Facades\Artisan::call('doctrine:schema:create');

        // TODO: Make Seeders

        echo 'success';
    }
}
