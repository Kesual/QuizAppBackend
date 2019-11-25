<?php

use App\Entities\Answer;
use Doctrine\Common\Collections\ArrayCollection;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['question' => 1, 'value' => '(hebräisch "Einer aus dem Volke") eigentlich Ascher Ginzberg, geb. Skwira (Russland) 1856,  gest. Tel Aviv 1927. Schriftsteller und Philosoph)', 'outcome' => true],
            ['question' => 2, 'value' => 'Prozess der Angleichung an die Umwelt, hier der jüdischen Minderheit an die nichtjüdische Mehrheit', 'outcome' => true],
            ['question' => 3, 'value' => 'gest. 135 n. Chr. Führer des Aufstandes der Juden in Palästina gegen die Römer', 'outcome' => true],
        ];

        $outcome = EntityManager::find(\App\Entities\Outcome::class, 1);

        foreach ($data as $item) {

            $question =EntityManager::find(\App\Entities\Question::class, $item['question']);

            $answer = new Answer();
            $answer->setQuestion($question);
            $answer->setValue($item['value']);
            $answer->setOutcome($outcome);
            EntityManager::persist($answer);
        }
        EntityManager::flush();
    }
}
