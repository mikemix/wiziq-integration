<?php
namespace mikemix\Wiziq\Tests\API\Request;

use mikemix\Wiziq\API\Request\CreatePermaClass;
use mikemix\Wiziq\Entity\PermaClassroom;

class CreatePermaClassTest extends \PHPUnit_Framework_TestCase
{
    /** @var PermaClassroom */
    private $classroom;

    private $params = [
        'title'           => 'Title',
        'presenter_email' => 'test@mike.com',
    ];

    /** @var CreatePermaClass */
    private $request;

    public function setUp()
    {
        $this->classroom = $this->getMockBuilder(PermaClassroom::class)
            ->setMethods(['toArray'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->classroom->expects($this->any())
            ->method('toArray')
            ->will($this->returnValue($this->params));

        $this->request   = new CreatePermaClass($this->classroom);
    }

    public function testGetMethod()
    {
        $this->assertEquals('create_perma_class', $this->request->getMethod());
    }

    public function testGetParams()
    {
        $this->assertEquals($this->params, $this->request->getParams());
    }
}
