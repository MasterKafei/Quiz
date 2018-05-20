<?php

namespace AppBundle\Service\Business;

use AppBundle\Service\Util\AbstractContainerAware;
use Symfony\Component\BrowserKit\Request;

/**
 * Class RequestBusiness
 * @package AppBundle\Service\Business
 */
class RequestBusiness extends AbstractContainerAware
{
    /**
     * @return null|\Symfony\Component\HttpFoundation\Request
     */
    public function getMasterRequest()
    {
        return $this->container->get('request_stack')->getMasterRequest();
    }

    /**
     * @param Request|null $request
     *
     * @return bool
     */
    public function isXmlHttpRequest(Request $request = null)
    {
        if (null === $request) {
            $request = $this->container->get('request_stack')->getMasterRequest();
        }

        return $request->isXmlHttpRequest();
    }

    /**
     * @return bool
     */
    public function isMasterRequest()
    {
        return (null === $this->container->get('request_stack')->getParentRequest());
    }
}

