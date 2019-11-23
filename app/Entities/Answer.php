<?php


namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/** @ORM\Entity
 *  @ORM\Table(name="answer")
 */
class Answer implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /** @ORM\Column(type="string") */
    private $value;
    /** @ORM\Column(type="boolean") */
    private $outcome;
    /**
     * @ORM\ManyToOne(targetEntity="AnswerType")
     */
    private $answerType;
    /**
     * @ORM\ManyToOne(targetEntity="Question")
     */
    private $question;

    /**
     * Answer constructor.
     */
    public function __construct()
    {
        $this->answerType = new ArrayCollection();
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getOutcome()
    {
        return $this->outcome;
    }

    /**
     * @param mixed $outcome
     */
    public function setOutcome($outcome): void
    {
        $this->outcome = $outcome;
    }

    /**
     * @return ArrayCollection
     */
    public function getAnswerType(): ArrayCollection
    {
        return $this->answerType;
    }

    /**
     * @param ArrayCollection $answerType
     */
    public function setAnswerType(ArrayCollection $answerType): void
    {
        $this->answerType = $answerType;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question): void
    {
        $this->question = $question;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'outcome' => $this->outcome,
            'answerType' => $this->answerType->toArray(),
        ];
    }
}
