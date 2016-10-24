<?php

namespace AppBundle\Controller;

use AppBundle\Entity\LanPosition;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LanSelectorController extends Controller
{
    /**
     * @Route("/selector", name="lanselector")
     * @Template
     */
    public function indexAction(Request $request)
    {
        return array("positions" => $this->getDoctrine()->getRepository("AppBundle:LanPosition")->findBy(array("enabled"=>true)), "user" => $this->getUser());
    }

    /**
     * @Route("/position/{id}", name="lanposition")
     * @Template
     */
    public function positionAction(Request $request, LanPosition $position)
    {
        if($position->getUser() == null && $position->isEnabled()) {
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery("SELECT p from AppBundle:LanPosition p WHERE p.user = :user")->setParameter("user", $this->getUser());
            foreach($query->getResult() as $result) {
                $result->setUser(null);
            }
            $position->setUser($this->getUser());
            $em->flush();
            }
        return $this->redirectToRoute('lanselector');

    }

    /**
     * @Route("/free", name="free")
     * @Template
     */
    public function freePositionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT p from AppBundle:LanPosition p WHERE p.user = :user")->setParameter("user", $this->getUser());
        foreach($query->getResult() as $result) {
            $result->setUser(null);
        }
        $em->flush();
        return $this->redirectToRoute('lanselector');

    }
}
