<?php

namespace OssBundle\Controller;

use OssBundle\Entity\SiteUser;
use OssBundle\Form\SiteUserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="oss.index")
     */
    public function indexAction()
    {
        $session = new Session();
        if ($session->get("id") != null){
            return $this->render('OssBundle:Default:index.html.twig', array("id"=>$session->get("id")));
        } else{
            $session->set("status", 0);
            return $this->render('OssBundle:Default:index.html.twig', array("id"=>$session->get("status")));
        }
    }

    /**
     * @Route("/inscription", name="oss.inscription")
     */
    public function registerAction(Request $request)
    {
        $siteUser = new SiteUser();
        $form =$this->createForm(SiteUserType::class,$siteUser);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $siteUser->setEnabled(1);
            //Persister l'objet
            $em=$this->getDoctrine()->getManager();
            $em->persist($siteUser);
            $em->flush();

            return $this->redirectToRoute("oss.index");
        }

        return $this->render('OssBundle:Default:inscription.html.twig', ["form"=>$form->createView()]);
    }

    /**
     * @Route("/spots", name="oss.spots")
     */
    public function spotListAction()
    {
        $spots = $this->getDoctrine()->getRepository('OssBundle:Spot')->findAll();
        return $this->render('OssBundle:Default:spots.html.twig', ["spots"=>$spots]);
    }

    /**
     * @Route("/getSpot", name="oss.getspot")
     */
    public function getSpotJsonAction()
    {
        $spots = $this->getDoctrine()->getRepository('OssBundle:Spot')->findAll();
        $serializer = $this->get('jms_serializer');
        $json = $serializer->serialize($spots, "json");
        $jsonResponse = new JsonResponse();
        $jsonResponse->setContent($json);
        return $jsonResponse;
    }
}
