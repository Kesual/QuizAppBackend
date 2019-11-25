<?php


namespace App\Repositories;

use App\Entities\Quiz;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class QuizRepository
{
    /**
     * @var string
     */
    private $class = 'App\Entities\Quiz';

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function create(Quiz $q)
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

    public function update(Quiz $q, $data)
    {
        $q->setName($data['name']);
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

    public function findQuizById($id)
    {
        return $this->em->getRepository($this->class)->findOneBy([
            'id' => $id
        ]);
    }

    public function delete(Quiz $q)
    {
        try {
            $this->em->remove($q);
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

    public function getQuizOnly ()
    {
        $qb = $this->getQueryBuilder();

        $query = $qb->select('q.id, q.name')
            ->from($this->class, 'q')
            ->getQuery();

        return $query->getResult();
    }

    public function getQueryBuilder()
    {
        return $this->em->createQueryBuilder();
    }
}
