<?php


namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/** @ORM\Entity
 *  @ORM\Table(name="question")
 */
class Question implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /** @ORM\Column(type="string", length=400) */
    private $value;
    /**
     * @ORM\ManyToOne(targetEntity="Quiz", fetch="EAGER")
     */
    private $quiz;
    /**
     * @ORM\ManyToOne(targetEntity="QuestionType", fetch="EAGER")
     */
    private $questionType;
    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="question", cascade={"all"})
     */
    private $answer;

    /**
     * Question constructor.
     * @param $answer
     */
    public function __construct()
    {
        $this->answer = new ArrayCollection();
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
    public function getQuiz()
    {
        return $this->quiz;
    }

    /**
     * @param mixed $quiz
     */
    public function setQuiz($quiz): void
    {
        $this->quiz = $quiz;
    }

    /**
     * @return ArrayCollection
     */
    public function getAnswer(): ArrayCollection
    {
        return $this->answer;
    }

    /**
     * @param ArrayCollection $answer
     */
    public function setAnswer(ArrayCollection $answer): void
    {
        $this->answer = $answer;
    }

    /**
     * @return mixed
     */
    public function getQuestionType()
    {
        return $this->questionType;
    }

    /**
     * @param mixed $questionType
     */
    public function setQuestionType($questionType): void
    {
        $this->questionType = $questionType;
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
            'questionType' => $this->questionType,
            'answer' => $this->answer->toArray(),
        ];
    }
}
