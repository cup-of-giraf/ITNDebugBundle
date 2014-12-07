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
                'secure_url' => true
            )
        );

        $this->assertContainerBuilderHasParameter('itn_debug_bundle.urls');
        $this->assertContainerBuilderHasParameter('itn_debug_bundle.secure_url');

        $this->assertSame(
            $this->container->getParameter('itn_debug_bundle.urls'),
            array()
        );
    }

    public function testLoadWithUrlsShouldSetUrlParameter()
    {
        $this->load(
            array(
                'urls' => array(
                    'my/url' => 'my url desc',
                    'my/other/url' => 'my other url desc'
                ),
                'secure_url' => true
            )
        );

        $this->assertContainerBuilderHasParameter('itn_debug_bundle.urls');
        $this->assertContainerBuilderHasParameter('itn_debug_bundle.secure_url');

        $this->assertSame(
            $this->container->getParameter('itn_debug_bundle.urls'),
            array(
                'my/url' => 'my url desc',
                'my/other/url' => 'my other url desc'
            )
        );
    }

    public function testLoadWithSecureUrlShouldSetSecureUrlParameter()
    {
        $this->load(
            array(
                'secure_url' => false
            )
        );

        $this->assertContainerBuilderHasParameter('itn_debug_bundle.secure_url');
        $this->assertFalse(
            $this->container->getParameter('itn_debug_bundle.secure_url')
        );
    }
}