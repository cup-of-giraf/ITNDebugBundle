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

    public function testLoadWithNoParamsShouldSetUrlsWithEmptyArray()
    {
        $this->load(
            array(
            )
        );

        $this->assertContainerBuilderHasParameter('itn_debug_bundle.urls');
        $this->assertContainerBuilderHasParameter('itn_debug_bundle.firewall_patern');

        $this->assertSame(
            $this->container->getParameter('itn_debug_bundle.urls'),
            array()
        );

        $this->assertSame(
            $this->container->getParameter('itn_debug_bundle.firewall_patern'),
            ''
        );
    }

    public function testLoadWithUrlsShouldSetUrlParameter()
    {
        $this->load(
            array(
                'urls' => array('url1', 'url2'),
            )
        );

        $this->assertContainerBuilderHasParameter('itn_debug_bundle.urls');
        $this->assertContainerBuilderHasParameter('itn_debug_bundle.firewall_patern');

        $this->assertSame(
            $this->container->getParameter('itn_debug_bundle.urls'),
            array('url1', 'url2')
        );

        $this->assertSame(
            $this->container->getParameter('itn_debug_bundle.firewall_patern'),
            '(url1)|(url2)'
        );
    }
}