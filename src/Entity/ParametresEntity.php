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
 * @ORM\Entity
 * @ORM\Table(name="parametres_entity")
 */
class ParametresEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id = 0;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $Libelle_params = "";

    /**
     * ParametresEntity constructor.
     * @param string $Libelle_params
     */
    public function __construct(?string $Libelle_params)
    {
        $this->Libelle_params = $Libelle_params;
    }

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
     * @return string
     */
    public function getLibelleParams(): string
    {
        return $this->Libelle_params;
    }

    /**
     * @param string $Libelle_params
     */
    public function setLibelleParams(string $Libelle_params): void
    {
        $this->Libelle_params = $Libelle_params;
    }
}