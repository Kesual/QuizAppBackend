<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('doctrine:schema:drop --force');
        Artisan::call('doctrine:schema:create');

        Artisan::call('db:seed --class=QuestionTypeSeeder');
        Artisan::call('db:seed --class=OutcomeSeeder');
        Artisan::call('db:seed --class=QuizSeeder');
        Artisan::call('db:seed --class=QuestionSeeder');
        Artisan::call('db:seed --class=AnswerSeeder');

        echo 'success';
    }
}
