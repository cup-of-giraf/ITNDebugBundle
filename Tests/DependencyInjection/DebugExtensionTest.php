<?php
/**
 * Date: 04/12/14
 * Time: 16:36
 */

use \Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;

class DebugExtensionTest extends AbstractExtensionTestCase
{
    protected function getContainerExtensions()
    {
        return array(
            new \ITN\DebugBundle\DependencyInjection\ITNDebugExtension()
        );
    }

    public function testLoadWithNoAuthorizedHostsShouldSetDefaultAuthorizedHost()
    {
        $this->load(
            array(
                'authorized_hosts' => array(),
            )
        );

        $this->assertContainerBuilderHasParameter('itn_debug_bundle.authorized_hosts');
        $this->assertContainerBuilderHasParameter('itn_debug_bundle.urls');

        $this->assertSame(
            $this->container->getParameter('itn_debug_bundle.authorized_hosts'),
            array('127.0.0.1')
        );

        $this->assertSame(
            $this->container->getParameter('itn_debug_bundle.urls'),
            array()
        );
    }

    public function testLoadWithAuthorizedHostsAndUrlShouldSetBundleParameters()
    {
        $this->load(
            array(
                'authorized_hosts' => array('coucou'),
                'urls' => array('url1', 'url2'),
            )
        );

        $this->assertContainerBuilderHasParameter('itn_debug_bundle.authorized_hosts');
        $this->assertContainerBuilderHasParameter('itn_debug_bundle.urls');

        $this->assertSame(
            $this->container->getParameter('itn_debug_bundle.authorized_hosts'),
            array('coucou')
        );

        $this->assertSame(
            $this->container->getParameter('itn_debug_bundle.urls'),
            array('url1', 'url2')
        );
    }
}