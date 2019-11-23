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
    /** @ORM\Column(type="string") */
    private $value;
    /**
     * @ORM\ManyToOne(targetEntity="Quiz")
     */
    private $quiz;
    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="id")
     */
    private $answer;

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
            'answer' => $this->answer->toArray(),
        ];
    }
}
