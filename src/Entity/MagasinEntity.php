<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25/12/17
 * Time: 11:05
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="magasin_entity")
 */
class MagasinEntity
{
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
     * @var \Datetime
     * @ORM\Column(type="datetime")
     */
    private $startDate = \Datetime::class;

    /**
     * @var \Datetime
     * @ORM\Column(type="datetime")
     */
    private $displayStartDate = \Datetime::class;

    /**
     * @var \Datetime
     * @ORM\Column(type="datetime")
     */
    private $displayEndDate = \Datetime::class;


    /**
     * @var CatalogueEntity
     * @ORM\ManyToOne(targetEntity="CatalogueEntity")
     */
    private $catalogue = CatalogueEntity::class;

    /**
     * MagasinEntity constructor.
     * @param int $import_id
     * @param \Datetime $startDate
     * @param \Datetime $displayStartDate
     * @param \Datetime $displayEndDate
     * @param CatalogueEntity $catalogueEntity
     */
    public function __construct(int $import_id, \Datetime $startDate, \Datetime $displayStartDate,
                                \Datetime $displayEndDate, CatalogueEntity $catalogueEntity)
    {
        $this->import_id = $import_id;
        $this->startDate = $startDate;
        $this->displayStartDate = $displayStartDate;
        $this->displayEndDate = $displayEndDate;
        $this->catalogue = $catalogueEntity;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
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
     * @return \Datetime
     */
    public function getStartDate(): \Datetime
    {
        return $this->startDate;
    }

    /**
     * @param \Datetime $startDate
     */
    public function setStartDate(\Datetime $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \Datetime
     */
    public function getDisplayStartDate(): \Datetime
    {
        return $this->displayStartDate;
    }

    /**
     * @param \Datetime $displayStartDate
     */
    public function setDisplayStartDate(\Datetime $displayStartDate): void
    {
        $this->displayStartDate = $displayStartDate;
    }

    /**
     * @return \Datetime
     */
    public function getDisplayEndDate(): \Datetime
    {
        return $this->displayEndDate;
    }

    /**
     * @param \Datetime $displayEndDate
     */
    public function setDisplayEndDate(\Datetime $displayEndDate): void
    {
        $this->displayEndDate = $displayEndDate;
    }


    /**
     * @return CatalogueEntity
     */
    public function getCatalogue(): CatalogueEntity
    {
        return $this->catalogue;
    }

    /**
     * @param CatalogueEntity $catalogue
     */
    public function setCatalogue(CatalogueEntity $catalogue): void
    {
        $this->catalogue = $catalogue;
    }
}