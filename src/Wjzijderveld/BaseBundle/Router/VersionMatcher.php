<?php

namespace Wjzijderveld\BaseBundle\Router;


use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Route;

class VersionMatcher extends UrlMatcher
{
    public function handleRouteRequirements($pathInfo, $name, Route $route)
    {
        $status = parent::handleRouteRequirements($pathInfo, $name, $route);
        if (self::REQUIREMENT_MISMATCH === $status[0]) {
            return $status;
        }

        $apiVersion = $this->getContext()->getApiVersion();
        $version = $route->getRequirement('_version');

        if ($version && $apiVersion !== $version) {
            return array(self::REQUIREMENT_MISMATCH, null);
        }

        return array(self::REQUIREMENT_MATCH, null);
    }
} 