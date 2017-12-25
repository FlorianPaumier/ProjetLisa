<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24/12/17
 * Time: 18:49
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class VisionneuseController
 * @package App\Controller
 */
class VisionneuseController
{

    /**
     * @param Environment $twig
     * @return Response
     */
    public function index(Environment $twig){
        return new Response($twig->render('Catalogue/accueil.html.twig'));
    }
}