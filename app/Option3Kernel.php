<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class Option3Kernel extends AppKernel
{
    public function __construct($environment, $debug)
    {
        parent::__construct($environment, $debug);
        $this->name = 'Option3App';
    }

    public function registerBundles()
    {
        $bundles = parent::registerBundles();
        $bundles[] = new Wjzijderveld\Option3\ApiBundle\WjzijderveldOption3ApiBundle();

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_option3_'.$this->getEnvironment().'.yml');
    }
}
