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
 * @ORM\Entity
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
}