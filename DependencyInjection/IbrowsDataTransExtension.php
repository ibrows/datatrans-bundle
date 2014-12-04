<?php

namespace Ibrows\DataTransBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;

class IbrowsDataTransExtension extends Extension
{
    /**
     * @param  array            $configs
     * @param  ContainerBuilder $container
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $configurationTree = $configuration->getConfigTreeBuilder()->buildTree();
        $processor = new Processor();
        $config = $processor->process($configurationTree, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('ibrows.datatrans.serviceid.logger', $config['logger']);
        $container->setParameter('ibrows.datatrans.serviceid.validator', $config['validator']);
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return 'ibrows_data_trans';
    }
}
