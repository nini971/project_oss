<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 08/09/2017
 * Time: 09:19
 */

namespace OssBundle\Controller;



use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * @Route("/licorne", name="oss.admin")
     */
    public function indexAdminAction()
    {
        $users = $this->getDoctrine()->getRepository("OssBundle:SiteUser")->findAll();
        $spots = $this->getDoctrine()->getRepository("OssBundle:Spot")->findAll();
        $fishs = $this->getDoctrine()->getRepository("OssBundle:Fish")->findAll();
        $comments = $this->getDoctrine()->getRepository("OssBundle:Comment")->findAll();

        return $this->render("@Oss/Default/admin_index.html.twig", ["spots"=>$spots, "users"=>$users, "fishs"=>$fishs, "comments"=>$comments]);
    }
}