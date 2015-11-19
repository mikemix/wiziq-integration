<?php
namespace mikemix\Wiziq\Tests\API;

use mikemix\Wiziq\API\Auth;
use mikemix\Wiziq\API\Gateway;
use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\Common\Http\ClientInterface;

class GatewayTest extends \PHPUnit_Framework_TestCase
{
    /** @var Auth|\PHPUnit_Framework_MockObject_MockObject */
    private $authMock;

    /** @var ClientInterface|\PHPUnit_Framework_MockObject_MockObject */
    private $client;

    /** @var RequestInterface|\PHPUnit_Framework_MockObject_MockObject */
    private $request;

    /** @var Gateway */
    private $gateway;

    public function setUp()
    {
        $this->authMock = $this->getMockBuilder(Auth::class)
            ->setMethods(['preparePayload'])
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $this->client = $this->getMockBuilder(ClientInterface::class)
            ->setMethods(['getResponse'])
            ->getMockForAbstractClass();

        $this->request = $this->getMockBuilder(RequestInterface::class)
            ->setMethods(['getMethod', 'getParams'])
            ->getMockForAbstractClass();

        $this->gateway = new Gateway($this->authMock, $this->client, 'http://api.wiziq.com');
    }

    public function testDoRequestAndCreateResponse()
    {
        $method = 'add_teacher';
        $data   = ['name' => 'teacher name'];

        $this->authMock->expects($this->atLeastOnce())
            ->method('preparePayload')
            ->with($this->equalTo($method), $this->equalTo($data))
            ->will($this->returnValue($data));

        $this->client->expects($this->atLeastOnce())
            ->method('getResponse')
            ->with($this->equalTo('http://api.wiziq.com?method=add_teacher'), $this->equalTo($data));

        $this->request->expects($this->atLeastOnce())
            ->method('getMethod')
            ->will($this->returnValue($method));

        $this->request->expects($this->atLeastOnce())
            ->method('getParams')
            ->will($this->returnValue($data));

        $this->gateway->sendRequest($this->request);
    }
}
