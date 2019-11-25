<?php


namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/** @ORM\Entity
 *  @ORM\Table(name="quiz")
 */
class Quiz implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /** @ORM\Column(type="string") */
    private $name;
    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="quiz")
     */
    private $question;

    /**
     * Quiz constructor.
     * @param $question
     */
    public function __construct()
    {
        $this->question = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return ArrayCollection
     */
    public function getQuestion(): ArrayCollection
    {
        //$this->question = new ArrayCollection();
        return $this->question;
    }

    /**
     * @param ArrayCollection $question
     */
    public function setQuestion(ArrayCollection $question): void
    {
        //$this->question = new ArrayCollection();
        $this->question = $question;
    }

    public function addQuestion($question): void
    {
        $this->question = $question;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'question' => $this->question->toArray(),
        ];
    }
}
