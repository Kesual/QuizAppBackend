<?php


namespace App\Repositories;

use App\Entities\Answer;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class AnswerRepository
{
    /**
     * @var string
     */
    private $class = 'App\Entities\Answer';

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function create(Answer $a)
    {
        try {
            $this->em->persist($a);
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

    public function update(Answer $a, $data)
    {
        $a->setValue($data['value']);
        $a->setAnswerType($data['AnswerType']);
        $a->setQuestion($data['question']);
        $a->setOutcome($data['outcome']);
        try {
            $this->em->persist($a);
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

    public function findMsgById($id)
    {
        return $this->em->getRepository($this->class)->findOneBy([
            'id' => $id
        ]);
    }

    public function delete(Answer $a)
    {
        try {
            $this->em->remove($a);
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

    public function getAll() {
        return $this->em->getRepository($this->class)->findAll();
    }
}
