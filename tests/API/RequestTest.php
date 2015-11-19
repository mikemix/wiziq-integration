<?php
namespace mikemix\Wiziq\Tests\API;

use mikemix\Wiziq\API\Request;
use mikemix\Wiziq\Common\Api\AuthInterface;
use mikemix\Wiziq\Common\Api\ResponseInterface;
use mikemix\Wiziq\Common\Provider\ProviderInterface;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    /** @var AuthInterface|\PHPUnit_Framework_MockObject_MockObject */
    private $authMock;

    /** @var ProviderInterface|\PHPUnit_Framework_MockObject_MockObject */
    private $providerMock;

    /** @var Request */
    private $request;

    public function setUp()
    {
        $this->authMock = $this->getMockBuilder(AuthInterface::class)
            ->setMethods(['prepareRequest'])
            ->getMockForAbstractClass();

        $this->providerMock = $this->getMockBuilder(ProviderInterface::class)
            ->setMethods(['getResponse'])
            ->getMockForAbstractClass();

        $this->request = new Request($this->authMock, $this->providerMock, 'http://api.wiziq.com');
    }

    public function testDoRequestAndCreateResponse()
    {
        $method = 'add_teacher';
        $data   = ['name' => 'teacher name'];

        $this->authMock->expects($this->once())
            ->method('prepareRequest')
            ->with($this->equalTo($method), $this->equalTo($data))
            ->will($this->returnValue($data));

        $this->providerMock->expects($this->once())
            ->method('getResponse')
            ->with($this->equalTo('http://api.wiziq.com?method=add_teacher'), $this->equalTo($data))
            ->will($this->returnValue('<rsp status="success"></rsp>'));

        $this->assertInstanceOf(ResponseInterface::class, $this->request->doRequest($method, $data));
    }
}
