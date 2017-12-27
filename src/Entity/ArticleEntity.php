<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25/12/17
 * Time: 10:58
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ArticleEntityRepository")
 * @ORM\Table(name="article_entity")
 */
class ArticleEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id = 0;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $import_id = 0;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $code = "";

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $label = "";

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $description = "";

    /**
     * ArticleEntity constructor.
     * @param int $import_id
     * @param string $code
     * @param string $label
     * @param string $description
     */
    public function __construct(int $import_id, string $code, string $label, string $description)
    {
        $this->import_id = $import_id;
        $this->code = $code;
        $this->label = $label;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId(): int
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
     * @return int
     */
    public function getImportId(): int
    {
        return $this->import_id;
    }

    /**
     * @param int $import_id
     */
    public function setImportId(int $import_id): void
    {
        $this->import_id = $import_id;
    }


    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


}