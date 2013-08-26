<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class Option2Kernel extends AppKernel
{
    public function __construct($environment, $debug)
    {
        parent::__construct($environment, $debug);
        $this->name = 'Option2App';
    }


    public function registerBundles()
    {
        $bundles = parent::registerBundles();
        $bundles[] = new Wjzijderveld\Option2\Api1Bundle\WjzijderveldOption2Api1Bundle();
        $bundles[] = new Wjzijderveld\Option2\Api2Bundle\WjzijderveldOption2Api2Bundle();

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_option2_'.$this->getEnvironment().'.yml');
    }
}
