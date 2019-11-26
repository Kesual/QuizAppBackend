<?php


namespace App\Repositories;

use App\Entities\QuestionType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class QuestionTypeRepository
{
    /**
     * @var string
     */
    private $class = 'App\Entities\QuestionType';

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function create(QuestionType $qt)
    {
        try {
            $this->em->persist($qt);
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

    public function update(QuestionType $qt, $data)
    {
        $qt->setType($data['type']);
        try {
            $this->em->persist($qt);
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

    public function findQTById($id)
    {
        return $this->em->getRepository($this->class)->findOneBy([
            'id' => $id
        ]);
    }

    public function delete(QuestionType $qt)
    {
        try {
            $this->em->remove($qt);
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
