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
 * Class OperationEntity
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="operation_entity")
 */
class OperationEntity
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
    private $importID = 0;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $startDate;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $endDate;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $codeCatalogue = "";

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $title = "";

    #endregion

    #region Ascesseur
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
     * @return int
     */
    public function getImportID(): int
    {
        return $this->importID;
    }

    /**
     * @param int $importID
     */
    public function setImportID(int $importID): void
    {
        $this->importID = $importID;
    }

    /**
     * @return string
     */
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate(\DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): \DateTime
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate(\DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return string
     */
    public function getCodeCatalogue(): string
    {
        return $this->codeCatalogue;
    }

    /**
     * @param string $codeCatalogue
     */
    public function setCodeCatalogue(string $codeCatalogue): void
    {
        $this->codeCatalogue = $codeCatalogue;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
#endregion

#region Construct

    /**
     * OperationEntity constructor.
     * @param DateTime $startDate
     * @param DateTime $endDate
     * @param string $codeCatalogue
     * @param string $title
     */
    public function __construct(int $importID = 0, DateTime $startDate = null, DateTime $endDate = null,
                                string $codeCatalogue = null, string $title = null)
    {
        $this->importID = $importID;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->codeCatalogue = $codeCatalogue;
        $this->title = $title;
    }

#endregion


}