<?php

namespace Evrinoma\GridBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GridController
 *
 * @package Evrinoma\GridBundle\Controller
 */
final class GridController extends AbstractController
{
//region SECTION: Public
    /**
     * @Route("/grid/ag_simple", options={"expose"=true}, name="grid_ag_simple")
     */
    public function gridAgSimple()
    {
        $event = ['titleHeader' => 'Grid', 'pageName' => 'Ag Simple Delta8'];

        return $this->render('@EvrinomaGrid/ag_simple.html.twig', $event);
    }

    /**
     * @Route("/grid/ag_tree", options={"expose"=true}, name="grid_ag_tree")
     */
    public function gridAgTree()
    {
        $event = ['titleHeader' => 'Grid', 'pageName' => 'AgTree Delta8'];

        return $this->render('@EvrinomaGrid/ag_tree.html.twig', $event);
    }

    /**
     * @Route("/grid/handson_tree", options={"expose"=true}, name="grid_handson_tree")
     */
    public function gridHandsonTree()
    {
        $event = ['titleHeader' => 'Grid', 'pageName' => 'Handson Delta8'];

        return $this->render('@EvrinomaGrid/handson_tree.html.twig', $event);
    }
//endregion Public
}