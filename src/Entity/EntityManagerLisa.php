<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/12/17
 * Time: 16:34
 */

namespace App\Entity;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class EntityManagerLisa extends EntityManager
{
    private $user = "phpmyadmin";
    private $password = "root";
    private $driver = "pd_mysl";
    private $manager;
    private $db_name = "Catalogue_DB";

    public function __construct(String $path)
    {
        $params = array(
            'driver'    => $this->driver,
            'user'      => $this->user,
            'password'  => $this->password,
            'dbname'    => $this->db_name
        );

        $config = Setup::createAnnotationMetadataConfiguration($path, false);

        $this->manager =  EntityManager::create($params, $config);
    }

    /**
     * @return EntityManager
     */
    public function getManager(): EntityManager
    {
        return $this->manager;
    }


}