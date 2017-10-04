<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 08/09/2017
 * Time: 09:19
 */

namespace OssBundle\Controller;



use OssBundle\Entity\Fish;
use OssBundle\Entity\SiteUser;
use OssBundle\Entity\Spot;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class AdminController
 * @package OssBundle\Controller
 * @Route("/licorne")
 */
class AdminController extends Controller
{

    /**
     * @Route("/", name="oss.admin")
     */
    public function indexAdminAction()
    {
        $users = $this->getDoctrine()->getRepository("OssBundle:SiteUser")->findBy([], ['id'=>'DESC'], 3);
        $spots = $this->getDoctrine()->getRepository("OssBundle:Spot")->findBy([], ['id'=>'DESC'], 3);
        $fishs = $this->getDoctrine()->getRepository("OssBundle:Fish")->findBy([], ['id'=>'DESC'], 3);
        $comments = $this->getDoctrine()->getRepository("OssBundle:Comment")->findBy([], ['id'=>'DESC'], 3);

        return $this->render("@Oss/Default/admin_index.html.twig", ["spots"=>$spots, "users"=>$users, "fishs"=>$fishs, "comments"=>$comments]);
    }

    /**
     * @Route("/deleteUser/{id}", name="oss.admin.deleteUser")
     */
    public function deleteUserAction(SiteUser $user)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute("oss.admin");
    }

    /**
     * @Route("/deleteSpot/{id}", name="oss.admin.deleteSpot")
     */
    public function deleteSpotAction(Spot $spot)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($spot);
        $em->flush();

        return $this->redirectToRoute("oss.admin");
    }

    /**
     * @Route("/deleteFish/{id}", name="oss.admin.deleteFish")
     */
    public function deleteFishAction(Fish $fish)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($fish);
        $em->flush();

        return $this->redirectToRoute("oss.admin");
    }

    /**
     * @Route("/spots", name="oss.admin.spots")
     */
    public function spotsAction()
    {
        $spots = $this->getDoctrine()->getRepository("OssBundle:Spot")->findAll();
        return $this->render("@Oss/Default/admin_spots.html.twig", ["spots"=>$spots]);
    }

    /**
     * @Route("/users", name="oss.admin.users")
     */
    public function usersAction()
    {
        $users = $this->getDoctrine()->getRepository("OssBundle:SiteUser")->findAll();
        return $this->render("@Oss/Default/admin_users.html.twig", ["users"=>$users]);
    }

    /**
     * @Route("/fishs", name="oss.admin.fishs")
     */
    public function fishsAction()
    {
        $fishs = $this->getDoctrine()->getRepository("OssBundle:Fish")->findAll();
        return $this->render("@Oss/Default/admin_fishs.html.twig", ["fishs"=>$fishs]);
    }


}