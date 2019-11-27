<?php

use App\Entities\Quiz;
use Illuminate\Database\Seeder;
use LaravelDoctrine\ORM\Facades\EntityManager;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quiz = new Quiz();
        $quiz->setName('ReliQuiz 5 Semester');
        EntityManager::persist($quiz);
        EntityManager::flush();
    }
}
