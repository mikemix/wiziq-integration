<?php
namespace mikemix\Wiziq\Tests\API\Request;

use mikemix\Wiziq\API\Request\Create;
use mikemix\Wiziq\Entity\Classroom;

class CreateTest extends \PHPUnit_Framework_TestCase
{
    /** @var Classroom */
    private $classroom;

    private $expected = [
        'title'           => 'Title',
        'presenter_email' => 'test@mike.com',
    ];

    private $params = [
        'title'           => 'Title',
        'presenter_email' => 'test@mike.com',
        'filter_empty'    => '',
    ];

    /** @var Create */
    private $request;

    public function setUp()
    {
        $this->classroom = $this->getMockBuilder(Classroom::class)
            ->setMethods(['toArray'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->classroom->expects($this->any())
            ->method('toArray')
            ->will($this->returnValue($this->params));

        $this->request = new Create($this->classroom);
    }

    public function testGetMethod()
    {
        $this->assertEquals('create', $this->request->getMethod());
    }

    public function testGetParams()
    {
        $this->assertEquals($this->expected, $this->request->getParams());
    }
}
