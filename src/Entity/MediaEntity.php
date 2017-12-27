<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27/12/17
 * Time: 21:02
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class MediaEntity
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="media_entity")
 */
class MediaEntity
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id = 0;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $type = "";

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $path = "";

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name = "";

    /**
     * MediaEntity constructor.
     * @param string $type
     * @param string $path
     * @param string $name
     */
    public function __construct(string $type, string $path, string $name)
    {
        $this->type = $type;
        $this->path = $path;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}