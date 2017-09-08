<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 04/09/2017
 * Time: 09:24
 */

namespace OssBundle\Controller;


use OssBundle\Entity\Area;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AndroidController extends Controller
{

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

    /**
     * @Route("/loginApp", name="oss.loginApp")
     */
    public function loginAppAction(Request $request)
    {
        $json = $request->getContent();
        $serializer = $this->get('jms_serializer');
        $loginApp = $serializer->deserialize($json, 'OssBundle\Entity\LoginApp', 'json');
        $siteUser = $this->getDoctrine()->getRepository('OssBundle:SiteUser')->findOneBy(["email"=>$loginApp->getLogin()]);
        $result = false;
        if($siteUser != null){
            $encoder_service = $this->get('security.encoder_factory');
            $encoder = $encoder_service->getEncoder($siteUser);
            $result = $encoder->isPasswordValid($siteUser->getPassword(), $loginApp->getPassword(), $siteUser->getSalt());
        }
        if ($result !== true){
            $siteUser = null;
        }
        $jsonResult = $serializer->serialize($siteUser, 'json');
        $jsonResponse = new JsonResponse();
        $jsonResponse->setContent($jsonResult);
        return $jsonResponse;
    }

    /**
     * @Route("/getSpotInArea/{id}", name="oss.getSpotInArea")
     */
    public function getSpotInArea(Area $area)
    {
        $spots = $this->getDoctrine()->getRepository('OssBundle:Spot')->findBy(['area'=>$area]);
        $serializer = $this->get('jms_serializer');
        $json = $serializer->serialize($spots, "json");
        $jsonResponse = new JsonResponse();
        $jsonResponse->setContent($json);
        return $jsonResponse;
    }
}