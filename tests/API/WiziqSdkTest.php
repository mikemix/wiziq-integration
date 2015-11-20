<?php
namespace mikemix\Wiziq\Tests\API;

use mikemix\Wiziq\API\Gateway;
use mikemix\Wiziq\API\Request;
use mikemix\Wiziq\API\WiziqSdk;
use mikemix\Wiziq\Entity\Teacher;

class WiziqSdkTest extends \PHPUnit_Framework_TestCase
{
    /** @var Gateway|\PHPUnit_Framework_MockObject_MockObject */
    private $gateway;

    /** @var WiziqSdk */
    private $sdk;

    public function setUp()
    {
        $this->gateway = $this->getMockBuilder(Gateway::class)
            ->disableOriginalConstructor()
            ->setMethods(['sendRequest'])
            ->getMock();

        $this->sdk = new WiziqSdk($this->gateway);
    }

    public function testAddTeacher()
    {
        $teacher = new Teacher('Mike Test', 'mike@test.com', 'password');

        $this->gateway->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo(new Request\AddTeacher($teacher)))
            ->will($this->returnValue(simplexml_load_string('<rsp><add_teacher><teacher_id>12345</teacher_id></add_teacher></rsp>')));

        $this->assertEquals(12345, $this->sdk->addTeacher($teacher));
    }

    public function testEditTeacher()
    {
        $teacherId = 12345;
        $teacher   = new Teacher('Mike Test', 'mike@test.com', 'password');

        $this->gateway->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo(new Request\EditTeacher($teacherId, $teacher)));

        $this->sdk->editTeacher($teacherId, $teacher);
    }

    public function testGetTeacherDetailsCall()
    {
        $teacherId = 1482;

        $this->gateway->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo(new Request\GetTeacherDetails($teacherId)))
            ->will($this->returnValue(
                simplexml_load_string(file_get_contents(__DIR__ . '/../.resources/get-teacher-details-success-response.txt'))
            ));

        $this->assertSame([
            'teacher_id'         => 1482,
            'name'               => 'Mike Lar',
            'email'              => 'mike@example.com',
            'password'           => 'xxxxxx',
            'phone_number'       => '+1 xxxxxxxxxx',
            'mobile_number'      => '+1 xxxxxxxxxx',
            'about_the_teacher'  => 'Online Facilitator and Teacher, British Columbia, Canada',
            'image'              => 'http://wqimg.s3.amazonaws.com/org/ut/umt/nav.gif',
            'time_zone'          => '23',
            'can_schedule_class' => true,
            'is_active'          => true,
        ], $this->sdk->getTeacherDetails($teacherId));
    }
}
