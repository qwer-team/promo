<?php

namespace Qwer\PromoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('QwerPromoBundle:Default:index.html.twig', array('name' => $name));
    }
}
