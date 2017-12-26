<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25/12/17
 * Time: 10:52
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * Class CatalogueEntity
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="catalogue_entity")
 */
class CatalogueEntity
{

    #region Fields

    /**
     * @var int
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
    private $type = "";

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $speed = "";

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $label = "";

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $catalogueWidth = 0;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $catalogueHeight = 0;

    /**
     * @var OperationEntity
     * @ORM\ManyToOne(targetEntity="OperationEntity")
     */
    private $operation;
    #endregion

    #region Ascesseur / Contructeur

    /**
     * CatalogueEntity constructor.
     * @param int $import_id
     * @param string $type
     * @param string $speed
     * @param string $label
     * @param int $catalogueWidth
     * @param int $catalogueHeight
     * @param $operation
     */
    public function __construct(int $import_id, string $type, string $speed, string $label, int $catalogueWidth, int $catalogueHeight, $operation)
    {
        $this->import_id = $import_id;
        $this->type = $type;
        $this->speed = $speed;
        $this->label = $label;
        $this->catalogueWidth = $catalogueWidth;
        $this->catalogueHeight = $catalogueHeight;
        $this->operation = $operation;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
    public function getSpeed(): string
    {
        return $this->speed;
    }

    /**
     * @param string $speed
     */
    public function setSpeed(string $speed): void
    {
        $this->speed = $speed;
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
     * @return int
     */
    public function getCatalogueWidth(): int
    {
        return $this->catalogueWidth;
    }

    /**
     * @param int $catalogueWidth
     */
    public function setCatalogueWidth(int $catalogueWidth): void
    {
        $this->catalogueWidth = $catalogueWidth;
    }

    /**
     * @return int
     */
    public function getCatalogueHeight(): int
    {
        return $this->catalogueHeight;
    }

    /**
     * @param int $catalogueHeight
     */
    public function setCatalogueHeight(int $catalogueHeight): void
    {
        $this->catalogueHeight = $catalogueHeight;
    }

    /**
     * @return mixed
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * @param mixed $operation
     */
    public function setOperation($operation): void
    {
        $this->operation = $operation;
    }


    #endregion

    #region Method
    #endregion

}