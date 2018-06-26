<?php

namespace AppBundle\Service\Extension;

use Doctrine\Common\Util\ClassUtils;

class ClassExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('class', array($this, 'getClass')),
        );
    }

    public function getClass($object)
    {
        return ClassUtils::getClass($object);
    }
}
