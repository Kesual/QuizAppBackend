<?php

use App\Entities\QuestionType;
use Illuminate\Database\Seeder;
use LaravelDoctrine\ORM\Facades\EntityManager;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questionType = new QuestionType();
        $questionType->setType('open');
        EntityManager::persist($questionType);

        $questionType = new QuestionType();
        $questionType->setType('close');
        EntityManager::persist($questionType);

        EntityManager::flush();
    }
}
