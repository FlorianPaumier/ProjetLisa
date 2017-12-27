<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/12/17
 * Time: 14:15
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="PrixArticleCategoryEntityRepository")
 * @ORM\Table(name="article_category_entity")
 */
class PrixArticleCategoryEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id = 0;

    /**
     * @var float
     * @ORM\Column(type="float", nullable=false)
     */
    private $price = 0.0;

    /**
     * @var float
     * @ORM\Column(type="float", nullable=true)
     */
    private $price_before_coupon = 0.0;

    /**
     * @var float
     * @ORM\Column(type="float", nullable=true)
     */
    private $price_crossed = 0.0;

    /**
     * @var float
     * @ORM\Column(type="float",nullable=true)
     */
    private $reduction_euro = 0.0;

    /**
     * @var int
     * @ORM\Column(type="integer",nullable=true)
     */
    private $reduction_pourcent = 0;

    /**
     * @var float
     * @ORM\Column(type="float",nullable=true)
     */
    private $avantage_euro = 0.0;
    /**
     * @var int
     * @ORM\Column(type="integer",nullable=true)
     */
    private $avantage_pourcent = 0;

    /**
     * @var float
     * @ORM\Column(type="float",nullable=true)
     */
    private $ecotaxe = 0.0;

    /**
     * @var float
     * @ORM\Column(type="float",nullable=true)
     */
    private $lower_price = 0.0;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="ArticleEntity")
     */
    private $article = ArticleEntity::class;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="CatalogueEntity")
     */
    private $catalogue = CatalogueEntity::class;

    /**
     * PrixArticleCategoryEntity constructor.
     * @param float $price
     * @param float $price_before_coupon
     * @param float $price_crossed
     * @param float $reduction_euro
     * @param int $reduction_pourcent
     * @param float $avantage_euro
     * @param int $avantage_pourcent
     * @param float $ecotaxe
     * @param float $lower_price
     * @param ArticleEntity $articleEntity
     * @param CatalogueEntity $catalogueEntity
     */
    public function __construct(float $price, ?float $price_before_coupon,
                                ?float $price_crossed, ?float $reduction_euro,
                                ?int $reduction_pourcent, ?float $avantage_euro,
                                ?int $avantage_pourcent, ?float $ecotaxe, ?float $lower_price,
                                ArticleEntity $articleEntity, CatalogueEntity $catalogueEntity)
    {
        $this->price = $price;
        $this->price_before_coupon = $price_before_coupon;
        $this->price_crossed = $price_crossed;
        $this->reduction_euro = $reduction_euro;
        $this->reduction_pourcent = $reduction_pourcent;
        $this->avantage_euro = $avantage_euro;
        $this->avantage_pourcent = $avantage_pourcent;
        $this->ecotaxe = $ecotaxe;
        $this->lower_price = $lower_price;
        $this->article = $articleEntity;
        $this->catalogue = $catalogueEntity;
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
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getPriceBeforeCoupon(): float
    {
        return $this->price_before_coupon;
    }

    /**
     * @param float $price_before_coupon
     */
    public function setPriceBeforeCoupon(float $price_before_coupon): void
    {
        $this->price_before_coupon = $price_before_coupon;
    }

    /**
     * @return float
     */
    public function getPriceCrossed(): float
    {
        return $this->price_crossed;
    }

    /**
     * @param float $price_crossed
     */
    public function setPriceCrossed(float $price_crossed): void
    {
        $this->price_crossed = $price_crossed;
    }

    /**
     * @return float
     */
    public function getReductionEuro(): float
    {
        return $this->reduction_euro;
    }

    /**
     * @param float $reduction_euro
     */
    public function setReductionEuro(float $reduction_euro): void
    {
        $this->reduction_euro = $reduction_euro;
    }

    /**
     * @return int
     */
    public function getReductionPourcent(): int
    {
        return $this->reduction_pourcent;
    }

    /**
     * @param int $reduction_pourcent
     */
    public function setReductionPourcent(int $reduction_pourcent): void
    {
        $this->reduction_pourcent = $reduction_pourcent;
    }

    /**
     * @return float
     */
    public function getAvantageEuro(): float
    {
        return $this->avantage_euro;
    }

    /**
     * @param float $avantage_euro
     */
    public function setAvantageEuro(float $avantage_euro): void
    {
        $this->avantage_euro = $avantage_euro;
    }

    /**
     * @return int
     */
    public function getAvantagePourcent(): int
    {
        return $this->avantage_pourcent;
    }

    /**
     * @param int $avantage_pourcent
     */
    public function setAvantagePourcent(int $avantage_pourcent): void
    {
        $this->avantage_pourcent = $avantage_pourcent;
    }

    /**
     * @return float
     */
    public function getEcotaxe(): float
    {
        return $this->ecotaxe;
    }

    /**
     * @param float $ecotaxe
     */
    public function setEcotaxe(float $ecotaxe): void
    {
        $this->ecotaxe = $ecotaxe;
    }


    /**
     * @return float
     */
    public function getLowerPrice(): float
    {
        return $this->lower_price;
    }

    /**
     * @param float $lower_price
     */
    public function setLowerPrice(float $lower_price): void
    {
        $this->lower_price = $lower_price;
    }

}