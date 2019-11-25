<?php

use App\Entities\Question;
use Doctrine\Common\Collections\ArrayCollection;
use Illuminate\Database\Seeder;
use LaravelDoctrine\ORM\Facades\EntityManager;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Achad Ha-Am (Judentum)',
            'Assimilation (Judentum)',
            'Bar-Kochba (Judentum)'
        ];

        $quiz = EntityManager::find(\App\Entities\Quiz::class, 1);
        $questiontype = EntityManager::find(\App\Entities\QuestionType::class, 1);

        foreach ($data as $item) {
            $question = new Question();
            $question->setValue($item);
            $question->setQuiz($quiz);
            $question->setQuestionType($questiontype);
            EntityManager::persist($question);

        }
        EntityManager::flush();
    }
}
