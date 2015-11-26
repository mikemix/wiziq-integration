<?php
namespace mikemix\Wiziq\Tests\API\Request;

use mikemix\Wiziq\API\Request\AddAttendees;
use mikemix\Wiziq\Entity\Attendees;

class AddAttendeesTest extends \PHPUnit_Framework_TestCase
{
    /** @var Attendees|\PHPUnit_Framework_MockObject_MockObject */
    private $attendees;

    /** @var AddAttendees */
    private $request;

    public function setUp()
    {
        $this->attendees = $this->getMockBuilder(Attendees::class)
            ->setMethods(['toXmlString'])
            ->getMock();

        $this->request   = new AddAttendees(12345, $this->attendees);
    }

    public function testGetMethod()
    {
        $this->assertEquals('add_attendees', $this->request->getMethod());
    }

    public function testGetParams()
    {
        $this->attendees->expects($this->once())
            ->method('toXmlString')
            ->will($this->returnValue('xml'));

        $params = [
            'class_id'      => 12345,
            'attendee_list' => 'xml',
        ];

        $this->assertEquals($params, $this->request->getParams());
    }
}
