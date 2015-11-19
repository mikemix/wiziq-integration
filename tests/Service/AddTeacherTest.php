<?php
namespace mikemix\Wiziq\Tests\Service;

use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\Common\Api\ResponseInterface;
use mikemix\Wiziq\Service\AddTeacher;
use mikemix\Wiziq\ValueObject\Teacher;

class AddTeacherTest extends \PHPUnit_Framework_TestCase
{
    /** @var RequestInterface|\PHPUnit_Framework_MockObject_MockObject */
    private $request;

    /** @var AddTeacher */
    private $service;

    public function setUp()
    {
        $this->request = $this->getMockBuilder(RequestInterface::class)
            ->setMethods(['doRequest'])
            ->getMockForAbstractClass();

        $this->service = new AddTeacher($this->request);
    }

    public function testAddTeacher()
    {
        $params = [
            'name'      => 'Test Mike',
            'email'     => 'test@mike.com',
            'password'  => 'password',
            'image'     => 'http://g.gl/img.jpg',
            'is_active' => true,
        ];

        $this->request->expects($this->once())
            ->method('doRequest')
            ->with($this->equalTo('add_teacher'), $this->equalTo($params))
            ->will($this->returnValue($this->getMockForAbstractClass(ResponseInterface::class)));

        $this->assertInstanceOf(ResponseInterface::class, $this->service->addTeacher(new Teacher(
            'Test Mike',
            'test@mike.com',
            'password',
            'http://g.gl/img.jpg'
        )));
    }
}
