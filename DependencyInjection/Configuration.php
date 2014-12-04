<?php

namespace Ibrows\DataTransBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ibrows_datatrans');

        $rootNode
            ->children()
                ->scalarNode('logger')->defaultValue('ibrows.datatrans.service.logger')->end()
                ->scalarNode('validator')->defaultValue('ibrows.datatrans.service.validator')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
