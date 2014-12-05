<?php

namespace ITN\DebugBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ITNDebugExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/Ressources/config'));
        $configuration = new Configuration();

        $configs = $this->processConfiguration($configuration, $configs);

        $container->setParameter(
            'itn_debug_bundle.urls',
            $configs['urls']
        );

        $container->setParameter(
            'itn_debug_bundle.authorized_hosts',
            $configs['authorized_hosts']
        );

        $loader->load('services.yml');
    }
}
