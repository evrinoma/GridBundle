<?php


namespace Evrinoma\GridBundle\Menu;


use Doctrine\ORM\EntityManagerInterface;
use Evrinoma\MenuBundle\Entity\MenuItem;
use Evrinoma\MenuBundle\Menu\MenuInterface;
use Evrinoma\SecurityBundle\Voter\RoleInterface;

/**
 * Class GridMenu
 *
 * @package Evrinoma\GridBundle\Menu
 */
final class GridMenu implements MenuInterface
{

    public function create(EntityManagerInterface $em): void
    {
        $gridAgSimple = new MenuItem();
        $gridAgSimple
            ->setRole([RoleInterface::ROLE_DEV_USER])
            ->setName('Ag Simple')
            ->setRoute('grid_ag_simple')
            ->setTag($this->tag());

        $em->persist($gridAgSimple);

        $gridAgTree = new MenuItem();
        $gridAgTree
            ->setRole([RoleInterface::ROLE_DEV_USER])
            ->setName('Ag Tree')
            ->setRoute('grid_ag_tree')
            ->setTag($this->tag());

        $em->persist($gridAgTree);

        $gridHandsonTree = new MenuItem();
        $gridHandsonTree
            ->setRole([RoleInterface::ROLE_DEV_USER])
            ->setName('Handson Tree')
            ->setRoute('grid_handson_tree')
            ->setTag($this->tag());

        $em->persist($gridHandsonTree);

        $menuDelta = new MenuItem();
        $menuDelta
            ->setRole([RoleInterface::ROLE_DEV_USER])
            ->setName('Grid')
            ->setUri('#')
            ->addChild($gridAgSimple)
            ->addChild($gridAgTree)
            ->addChild($gridHandsonTree)
            ->setTag($this->tag());

        $em->persist($menuDelta);
    }

    public function order(): int
    {
        return 6;
    }

    public function tag(): string
    {
        return MenuInterface::DEFAULT_TAG;
    }
}