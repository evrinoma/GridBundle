<?php


namespace Evrinoma\GridBundle;



use Evrinoma\GridBundle\DependencyInjection\EvrinomaGridExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EvrinomaGridBoardBundle extends Bundle
{
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new EvrinomaGridExtension();
        }
        return $this->extension;
    }
}