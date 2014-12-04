<?php

namespace Ibrows\DataTransBundle\Tests\Application;

use Ibrows\DataTransBundle\IbrowsDataTransBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    /**
     * Returns an array of bundles to register.
     *
     * @return BundleInterface[] An array of bundle instances.
     *
     * @api
     */
    public function registerBundles()
    {
        return array(
            new IbrowsDataTransBundle()
        );
    }

    /**
     * Loads the container configuration.
     *
     * @param LoaderInterface $loader A LoaderInterface instance
     *
     * @api
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config_'.$this->getEnvironment().'.yml');
    }
}
