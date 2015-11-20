<?php
namespace mikemix\Wiziq\Tests\API;

use mikemix\Wiziq\API\Gateway;
use mikemix\Wiziq\API\Request\AddTeacher;
use mikemix\Wiziq\API\Request\EditTeacher;
use mikemix\Wiziq\API\Request\GetTeacherDetails;
use mikemix\Wiziq\API\Response;
use mikemix\Wiziq\API\WiziqSdk;
use mikemix\Wiziq\Common\API\Exception\CallException;
use mikemix\Wiziq\Entity\Teacher;

class WiziqSdkTest extends \PHPUnit_Framework_TestCase
{
    /** @var Gateway|\PHPUnit_Framework_MockObject_MockObject */
    private $gateway;

    /** @var Response|\PHPUnit_Framework_MockObject_MockObject */
    private $response;

    /** @var WiziqSdk */
    private $sdk;

    public function setUp()
    {
        $this->gateway = $this->getMockBuilder(Gateway::class)
            ->disableOriginalConstructor()
            ->setMethods(['sendRequest'])
            ->getMock();

        $this->response = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->setMethods(['isSuccess', 'getResponse', 'getErrorCode', 'getErrorMessage'])
            ->getMock();

        $this->sdk = new WiziqSdk($this->gateway);
    }

    public function testAddTeacherSuccessCall()
    {
        $teacher = new Teacher('Mike Test', 'mike@test.com', 'password');

        $this->gateway->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo(new AddTeacher($teacher)))
            ->will($this->returnValue($this->response));

        $this->response->expects($this->once())->method('isSuccess')->will($this->returnValue(true));
        $this->response->expects($this->once())->method('getResponse')->will($this->returnValue(
            simplexml_load_string('<rsp><add_teacher><teacher_id>12345</teacher_id></add_teacher></rsp>')
        ));

        $this->assertEquals(12345, $this->sdk->addTeacher($teacher));
    }

    public function testAddTeacherFail()
    {
        $this->gateway->expects($this->once())
            ->method('sendRequest')
            ->will($this->returnValue($this->response));

        $this->response->expects($this->any())->method('isSuccess')->will($this->returnValue(false));
        $this->response->expects($this->any())->method('getErrorCode')->will($this->returnValue(100));
        $this->response->expects($this->any())->method('getErrorMessage')->will($this->returnValue('Error'));

        $this->setExpectedException(CallException::class);
        $this->sdk->addTeacher(new Teacher('Mike Test', 'mike@test.com', 'password'));
    }

    public function testEditTeacherSuccessCall()
    {
        $teacherId = 12345;
        $teacher   = new Teacher('Mike Test', 'mike@test.com', 'password');

        $this->gateway->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo(new EditTeacher($teacherId, $teacher)))
            ->will($this->returnValue($this->response));

        $this->response->expects($this->once())->method('isSuccess')->will($this->returnValue(true));
        $this->response->expects($this->once())->method('getResponse')->will($this->returnValue(''));

        $this->sdk->editTeacher($teacherId, $teacher);
    }

    public function testEditTeacherFail()
    {
        $this->gateway->expects($this->once())
            ->method('sendRequest')
            ->will($this->returnValue($this->response));

        $this->response->expects($this->any())->method('isSuccess')->will($this->returnValue(false));
        $this->response->expects($this->any())->method('getErrorCode')->will($this->returnValue(100));
        $this->response->expects($this->any())->method('getErrorMessage')->will($this->returnValue('Error'));

        $this->setExpectedException(CallException::class);
        $this->sdk->editTeacher(12345, new Teacher('Mike Test', 'mike@test.com', 'password'));
    }

    public function testGetTeacherDetailsSuccessCall()
    {
        $teacherId = 1482;

        $this->gateway->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo(new GetTeacherDetails($teacherId)))
            ->will($this->returnValue($this->response));

        $this->response->expects($this->once())->method('isSuccess')->will($this->returnValue(true));
        $this->response->expects($this->once())->method('getResponse')->will($this->returnValue(
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
