<?php

namespace Nexmo\Tests;

use GuzzleHttp as Guzzle;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MockHandler
     */
    private $mockHandler;

    /**
     * @return Guzzle\Client|\PHPUnit_Framework_MockObject_MockObject
     */
    protected function guzzle()
    {
        $mockHandler = $this->guzzleMockHandler();
        // $handler = Guzzle\HandlerStack::create($mockHandler);

        $client = new Guzzle\Client();
        $client->getEmitter()->on('before', function (Guzzle\Event\BeforeEvent $e) {
            // Guzzle v5 events relied on mutation
            $e->getRequest()->setHeader($mockHandler);
        });


        return $client ;
    }

    /**
     * @return Guzzle\Subscriber\Mock
     */
    protected function guzzleMockHandler()
    {
        if (!$this->mockHandler) {
            $this->mockHandler = new Guzzle\Subscriber\Mock();
        }

        return $this->mockHandler;
    }

    /**
     * @param $json
     */
    protected function addJsonResponse($json)
    {
        $this->addResponse(json_encode($json));
    }

    /**
     * @param $string
     */
    protected function addResponse($string)
    {
        $response = new Response(200, [], $string);
        $this->guzzleMockHandler()->addResponse($response);
    }
}
