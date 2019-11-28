<?php


namespace App\Repositories;

use App\Entities\Question;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class QuestionRepository
{
    /**
     * @var string
     */
    private $class = 'App\Entities\Question';

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function create(Question $q)
    {
        try {
            $this->em->persist($q);
        } catch (ORMException $e) {
            echo $e;
        }
        try {
            $this->em->flush();
        } catch (OptimisticLockException $e) {
            echo $e;
        } catch (ORMException $e) {
            echo $e;
        }
    }

    public function update(Question $q, $data)
    {
        $q->setValue($data['value']);
        $q->setQuiz($data['quiz']);
        try {
            $this->em->persist($q);
        } catch (ORMException $e) {
            echo $e;
        }
        try {
            $this->em->flush();
        } catch (OptimisticLockException $e) {
            echo $e;
        } catch (ORMException $e) {
            echo $e;
        }
        return 'success';
    }

    public function findById($id)
    {
        return $this->em->getRepository($this->class)->findOneBy([
            'id' => $id
        ]);
    }

    public function delete(Question $q)
    {
        try {
            $this->em->remove($q);
        } catch (ORMException $e) {
        }
        try {
            $this->em->flush();
        } catch (OptimisticLockException $e) {
            echo $e;
        } catch (ORMException $e) {
            echo $e;
        }
        return 'success';
    }

    public function getAll()
    {
        return $this->em->getRepository($this->class)->findAll();
    }
}
