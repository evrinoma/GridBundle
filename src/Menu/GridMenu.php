<?php


namespace Evrinoma\GridBundle\Menu;


use Doctrine\ORM\EntityManagerInterface;
use Evrinoma\MenuBundle\Entity\MenuItem;
use Evrinoma\MenuBundle\Manager\MenuInterface;
use Evrinoma\UtilsBundle\Voiter\RoleInterface;

/**
 * Class GridMenu
 *
 * @package Evrinoma\GridBundle\Menu
 */
final class GridMenu implements MenuInterface
{

    public function createMenu(EntityManagerInterface $em): void
    {
        $gridAgSimple = new MenuItem();
        $gridAgSimple
            ->setRole([RoleInterface::ROLE_DEV_USER])
            ->setName('Ag Simple')
            ->setRoute('grid_ag_simple');

        $em->persist($gridAgSimple);

        $gridAgTree = new MenuItem();
        $gridAgTree
            ->setRole([RoleInterface::ROLE_DEV_USER])
            ->setName('Ag Tree')
            ->setRoute('grid_ag_tree');

        $em->persist($gridAgTree);

        $gridHandsonTree = new MenuItem();
        $gridHandsonTree
            ->setRole([RoleInterface::ROLE_DEV_USER])
            ->setName('Handson Tree')
            ->setRoute('grid_handson_tree');

        $em->persist($gridHandsonTree);

        $menuDelta = new MenuItem();
        $menuDelta
            ->setRole([RoleInterface::ROLE_DEV_USER])
            ->setName('Grid')
            ->setUri('#')
            ->addChild($gridAgSimple)
            ->addChild($gridAgTree)
            ->addChild($gridHandsonTree)
        ;

        $em->persist($menuDelta);
    }

    public function order(): int
    {
        return 6;
    }
}