<?php
/**
 * Date: 04/12/14
 * Time: 17:31
 */

namespace ITN\DebugBundle\DataCollector;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollectorInterface;

class DebugUrlCollector implements DataCollectorInterface
{

    private $debugUrls;

    public function __construct(array $debugUrls)
    {
        $this->debugUrls = $debugUrls;
    }

    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        $this->data = array(
            'urls' => $this->debugUrls
        );
    }

    public function getName()
    {
        return 'itn_debug_bundle.debug_url_collector';
    }
}