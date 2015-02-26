<?php

class VoiceTest extends PHPUnit_Framework_TestCase
{
    public function testExec()
    {
        $client = $this->getMockBuilder('\GuzzleHttp\Client')->disableOriginalConstructor()->getMock();
        $this->setExpectedException('Nexmo\Exception');
        $service = new \Nexmo\Service\Voice($client);
        $service->invoke();
    }

    public function testGetPath()
    {
        $client = $this->getMockBuilder('\GuzzleHttp\Client')->disableOriginalConstructor()->getMock();
        $service = new \Nexmo\Service\Voice($client);
        $this->assertEquals($service->getPath(), '/voice/json');
    }

    public function testValidateResponse()
    {
        $client = $this->getMockBuilder('\GuzzleHttp\Client')->disableOriginalConstructor()->getMock();
        $service = new VoiceMock($client);
        $this->assertTrue($service->testValidateResponse([]));
    }
}

class VoiceMock extends \Nexmo\Service\Voice
{
    public function testValidateResponse($params)
    {
        return $this->validateResponse($params);
    }
}
 