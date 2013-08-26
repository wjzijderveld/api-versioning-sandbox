<?php

namespace Wjzijderveld\BaseBundle\Router;

use Symfony\Component\Routing\RequestContext as BaseRequestContext;

class RequestContext extends BaseRequestContext
{
    private $apiVersion;

    /**
     * Set the requested API version
     *
     * @param string $version
     */
    public function setApiVersion($version)
    {
        $this->apiVersion = $version;
    }

    /**
     * Returns the requested API version
     * @return string
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

} 