<?php

namespace OssBundle\Controller;

use OssBundle\Entity\FishInSpot;
use OssBundle\Entity\SiteUser;
use OssBundle\Entity\Spot;
use OssBundle\Form\FishInSpotType;
use OssBundle\Form\SiteUserType;
use OssBundle\Form\SpotType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints\Date;

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
     * @Route("/addSpot", name="oss.addSpot")
     */
    public function addSpotAction(Request $request)
    {
        $fishs = $this->getDoctrine()->getRepository('OssBundle:Fish')->findAll();
        $spot = new Spot();
        $form =$this->createForm(SpotType::class, $spot);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user = $this->getUser();
            $spot->setSiteUser($user);
            //Persister l'objet
            $em=$this->getDoctrine()->getManager();
            $em->persist($spot);
            $em->flush();

            return $this->redirectToRoute("oss.index");
        }

        return $this->render('OssBundle:Default:addSpot.html.twig', ["form"=>$form->createView(), "fishs"=>$fishs]);
    }
}
