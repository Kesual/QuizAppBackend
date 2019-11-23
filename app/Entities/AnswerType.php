<?php


namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/** @ORM\Entity
 *  @ORM\Table(name="answertype")
 */
class AnswerType implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /** @ORM\Column(type="string") */
    private $type;
    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="answerType")
     */
    private $answer;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param mixed $answer
     */
    public function setAnswer($answer): void
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
            'type' => $this->type
        ];
    }
}
