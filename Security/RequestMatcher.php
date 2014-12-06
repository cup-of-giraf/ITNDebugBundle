<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 06/12/14
 * Time: 23:48
 */

namespace ITN\DebugBundle\Security;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestMatcherInterface;

class RequestMatcher implements RequestMatcherInterface
{
    /**
     * @var array
     */
    private $urls;

    public function __construct(array $urls)
    {
        $this->urls = $urls;
    }

    public function matches(Request $request)
    {
        return in_array($request->getRequestUri(), $this->urls);
    }
}
