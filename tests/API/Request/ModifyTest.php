<?php
namespace mikemix\Wiziq\Tests\API\Request;

use mikemix\Wiziq\API\Request\Modify;
use mikemix\Wiziq\Entity\Classroom;

class ModifyTest extends \PHPUnit_Framework_TestCase
{
    /** @var Classroom */
    private $classroom;

    private $expected = [
        'class_id'        => 12345,
        'title'           => 'Title',
        'presenter_email' => 'test@mike.com'
    ];

    private $params = [
        'title'           => 'Title',
        'presenter_email' => 'test@mike.com'
    ];

    /** @var Modify */
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

        $this->request = new Modify(12345, $this->classroom);
    }

    public function testGetMethod()
    {
        $this->assertEquals('modify', $this->request->getMethod());
    }

    public function testGetParams()
    {
        $this->assertEquals($this->expected, $this->request->getParams());
    }
}
