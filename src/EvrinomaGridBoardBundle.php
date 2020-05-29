<?php


namespace Evrinoma\GridBundle;



use Evrinoma\GridBundle\DependencyInjection\EvrinomaGridExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EvrinomaGridBundle extends Bundle
{
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new EvrinomaGridExtension();
        }
        return $this->extension;
    }
}