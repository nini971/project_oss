<?php

namespace OssBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $session = new Session();
        if ($session->get("id") != null){
            return $this->render('OssBundle:Default:index.html.twig', array("id"=>$session->get("id")));
        } else{
            return $this->render('OssBundle:Default:index.html.twig', array("id"=>"not connected"));
        }
    }
}
