<?php
/**
 * Date: 05/12/14
 * Time: 10:27
 */

use Mockery as m;

class DebugUrlCollectorTest extends PHPUnit_Framework_TestCase
{
    public function testCollectShouldSetDebugUrlsWithTheDebugUrlsGivenInTheConstructor()
    {
        $givenUrls = array('url' => 'coucou');
        $colector = new \ITN\DebugBundle\DataCollector\DebugUrlCollector($givenUrls);

        $colector->collect(
            m::mock('Symfony\Component\HttpFoundation\Request'),
            m::mock('Symfony\Component\HttpFoundation\Response')
        );

        $this->assertArrayHasKey('urls', $colector->data);
        $this->assertSame($colector->data['urls'], $givenUrls);

    }
}