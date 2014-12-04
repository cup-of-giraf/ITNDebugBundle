<?php

namespace ITN\DebugBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('itn_debug_bundle');

        $child = $rootNode
            ->children();

        $child
            ->arrayNode('authorized_hosts')
                ->beforeNormalization()
                    ->ifTrue(function($v) { return count($v) === 0; })
                    ->then(function($v) { return array('127.0.0.1'); })
                ->end()
                ->prototype('scalar')->end()
            ->end()
            ->arrayNode('urls')
                ->prototype('scalar')->end()
            ->end();


        return $treeBuilder;
    }
}
