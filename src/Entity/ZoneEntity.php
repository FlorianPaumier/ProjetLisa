<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25/12/17
 * Time: 10:59
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ZoneEntityRepository")
 * @ORM\Table(name="zone_entity")
 */
class ZoneEntity
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
     * @var int
     * @ORM\Column(type="integer")
     */
    private $coordx = 0;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $coordy = 0;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $width = 0;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $height = 0;



    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="ArticleEntity")
     */
    private $article = ArticleEntity::class;

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
     * @return int
     */
    public function getCoordx(): int
    {
        return $this->coordx;
    }

    /**
     * @param int $coordx
     */
    public function setCoordx(int $coordx): void
    {
        $this->coordx = $coordx;
    }

    /**
     * @return int
     */
    public function getCoordy(): int
    {
        return $this->coordy;
    }

    /**
     * @param int $coordy
     */
    public function setCoordy(int $coordy): void
    {
        $this->coordy = $coordy;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getArticle(): string
    {
        return $this->article;
    }

    /**
     * @param string $article
     */
    public function setArticle(string $article): void
    {
        $this->article = $article;
    }

    /**
     * ZoneEntity constructor.
     * @param string $type
     * @param int $coordx
     * @param int $coordy
     * @param int $width
     * @param int $height
     */
    public function __construct(string $type, int $coordx, int $coordy, int $width, int $height, ArticleEntity $articleEntity)
    {
        $this->type = $type;
        $this->coordx = $coordx;
        $this->coordy = $coordy;
        $this->width = $width;
        $this->height = $height;
        $this->article = $articleEntity;
    }
}