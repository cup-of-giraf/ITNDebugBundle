<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 07/12/14
 * Time: 00:48
 */

namespace Security;

use Mockery as m;
use ITN\DebugBundle\Security\RequestMatcher;

class RequestMatcherTest extends \PHPUnit_Framework_TestCase
{
    public function testMatchesShouldReturnTrueIfGivenUrlIsInTheArrayOfUrl()
    {
        $matcher = new RequestMatcher(array('my/url'));

        $this->assertTrue($matcher->matches($this->getRequest('my/url')));
    }

    public function testMatchesShouldReturnFalseIfGivenUrlIsNotInTheArrayOfUrl()
    {
        $matcher = new RequestMatcher(array('my/url'));

        $this->assertFalse($matcher->matches($this->getRequest('my/other/url')));
    }

    protected function getRequest($uri)
    {
        return m::mock(
            'Symfony\Component\HttpFoundation\Request',
            array(
                'getRequestUri' => $uri
            )
        );
    }

    public function tearDown()
    {
        m::close();
    }

}

 