<?php

namespace Wjzijderveld\BaseBundle\Router;


use Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\AcceptHeader;
use Symfony\Component\HttpFoundation\AcceptHeaderItem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\RequestMatcherInterface;
use Symfony\Component\Routing\RequestContext as BaseRequestContext;

class ApiRouter extends Router implements RequestMatcherInterface
{
    private $acceptHeader;

    public function __construct(ContainerInterface $container, $resource, array $options = array(), BaseRequestContext $context = null)
    {
        parent::__construct($container, $resource, $options, new RequestContext());
        $this->acceptHeader = 'application/vnd.wjzijderveld.api+json';
    }

    /**
     * Tries to match a request with a set of routes.
     *
     * If the matcher can not find information, it must throw one of the exceptions documented
     * below.
     *
     * @param Request $request The request to match
     *
     * @return array An array of parameters
     *
     * @throws ResourceNotFoundException If no matching resource could be found
     * @throws MethodNotAllowedException If a matching resource was found but the request method is not allowed
     */
    public function matchRequest(Request $request)
    {
        $acceptHeader = AcceptHeader::fromString($request->headers->get('Accept'))->get($this->acceptHeader);

        if (null === $acceptHeader) {
            return $this->match($request->getPathInfo());
        }

        if (null === ($version = $acceptHeader->getAttribute('version'))) {
            return $this->match($request->getPathInfo());
        }

        $this->getContext()->setApiVersion($version);

        return $this->match($request->getPathInfo());
    }

}
