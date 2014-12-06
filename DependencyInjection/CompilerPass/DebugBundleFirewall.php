<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 06/12/14
 * Time: 15:01
 */

namespace ITN\DebugBundle\DependencyInjection\CompilerPass;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\DependencyInjection\Reference;

class DebugBundleFirewall implements CompilerPassInterface
{
    public function process(ContainerBuilder $builder)
    {
        if ($builder->getParameter('itn_debug_bundle.secure_url') || !array_key_exists('security', $builder->getExtensions())) {
            return;
        }

        $firewallMap = $builder->getDefinition('security.firewall.map')->getArgument(1);

        // create firewall context
        $contextId = 'security.firewall.map.context.itn_debug';
        $firewall = $builder->setDefinition($contextId, new DefinitionDecorator('security.firewall.context'));
        $firewall
            ->replaceArgument(0, array())
            ->replaceArgument(1, null);

        // create request matcher
        $builder
            ->register('security.request_matcher.itn_debug', 'ITN\DebugBundle\Security\RequestMatcher')
            ->setPublic(false)
            ->setArguments(
                array(
                    $builder->getParameter('itn_debug_bundle.application_urls')
                )
            );


        // add firewall in firewall map
        $firewallMap = $builder->getDefinition('security.firewall.map')->getArgument(1);
        $firewallMap = array_merge(
            array(
                'security.firewall.map.context.itn_debug' => new Reference('security.request_matcher.itn_debug')
            ),
            $firewallMap
        );
        $builder->getDefinition('security.firewall.map')->replaceArgument(1, $firewallMap);
    }
}