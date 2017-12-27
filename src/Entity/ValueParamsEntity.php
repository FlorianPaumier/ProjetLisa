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
 * @ORM\Table(name="value_params_entity")
 */
class ValueParamsEntity
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $value = "";

    /**
     * @var ParametresEntity
     * @ORM\ManyToOne(targetEntity="ParametresEntity")
     */
    private $params = ParametresEntity::class;

    /**
     * @var ArticleEntity
     * @ORM\ManyToOne(targetEntity="ArticleEntity")
     */
    private $article = ArticleEntity::class;

    /**
     * ValueParamsEntity constructor.
     * @param string $value
     * @param string $params
     * @param string $article
     */
    public function __construct(?string $value, ParametresEntity $params, ArticleEntity $article)
    {
        $this->value = $value;
        $this->params = $params;
        $this->article = $article;
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
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getParams(): string
    {
        return $this->params;
    }

    /**
     * @param string $params
     */
    public function setParams(string $params): void
    {
        $this->params = $params;
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
}