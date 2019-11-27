<?php

use App\Entities\Outcome;
use Illuminate\Database\Seeder;
use LaravelDoctrine\ORM\Facades\EntityManager;

class OutcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $outcome = new Outcome();
        $outcome->setValue(true);
        EntityManager::persist($outcome);

        $outcome = new Outcome();
        $outcome->setValue(false);
        EntityManager::persist($outcome);

        EntityManager::flush();
    }
}
