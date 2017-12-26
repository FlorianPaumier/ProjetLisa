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
 * @ORM\Entity
 * @ORM\Table(name="page_entity")
 */
class PageEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id = 0;

    /**
     * @ORM\Column(type="integer")
     */
    private $import_id = 0;

    /**
     * @ORM\Column(type="integer")
     */
    private $number = 0;

    /**
     * @var CatalogueEntity
     * @ORM\ManyToOne(targetEntity="CatalogueEntity")
     */
    private $catalogue;

    /**
     * @return mixed
     */
    public function getCatalogue()
    {
        return $this->catalogue;
    }

    /**
     * @param mixed $catalogue
     */
    public function setCatalogue($catalogue): void
    {
        $this->catalogue = $catalogue;
    }

    /**
     * PageEntity constructor.
     * @param int $import_id
     * @param int $number
     */
    public function __construct(int $import_id, int $number, CatalogueEntity $catalogue)
    {
        $this->import_id = $import_id;
        $this->number = $number;
        $this->catalogue = $catalogue;
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
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber(int $number): void
    {
        $this->number = $number;
    }


}