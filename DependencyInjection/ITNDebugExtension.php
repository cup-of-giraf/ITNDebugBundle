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
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $configuration = new Configuration();

        $configs = $this->processConfiguration($configuration, $configs);

        $container->setParameter(
            'itn_debug_bundle.urls',
            $configs['urls']
        );

        $container->setParameter(
            'itn_debug_bundle.firewall_patern',
            $this->getFirewallPatern($configs['urls'])
        );


        $loader->load('services.yml');
    }

    protected function getFirewallPatern(array $urls)
    {
        $urls = array_map(
            function ($item) {
                return '(' . $item . ')';
            },
            $urls
        );

        return implode('|', $urls);
    }
}
