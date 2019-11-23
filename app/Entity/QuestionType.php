<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity
 *  @ORM\Table(name="Questiontype")
 */
class QuestionType
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /** @ORM\Column(type="string") */
    private $type;
}
