<?php


namespace App\Repositories;


use App\Entities\Outcome;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class OutcomeRepository
{
    /**
     * @var string
     */
    private $class = 'App\Entities\Outcome';

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function create(Outcome $o)
    {
        try {
            $this->em->persist($o);
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

    public function update(Outcome $o, $data)
    {
        $o->setValue($data['value']);
        try {
            $this->em->persist($o);
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

    public function findOutcomeById($id)
    {
        return $this->em->getRepository($this->class)->findOneBy([
            'id' => $id
        ]);
    }

    public function delete(Outcome $o)
    {
        try {
            $this->em->remove($o);
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
