<?php
namespace mikemix\Wiziq\Tests\API\Request;

use mikemix\Wiziq\API\Request\EditTeacher;
use mikemix\Wiziq\Entity\Teacher;

class EditTeacherTest extends \PHPUnit_Framework_TestCase
{
    /** @var Teacher */
    private $teacher;

    /** @var EditTeacher */
    private $request;

    public function setUp()
    {
        $this->teacher = new Teacher('Test Mike', 'test@mike.com', 'password');
        $this->request = new EditTeacher(12345, $this->teacher);
    }

    public function testGetMethod()
    {
        $this->assertEquals('edit_teacher', $this->request->getMethod());
    }

    public function testGetParams()
    {
        $params = [
            'teacher_id'         => 12345,
            'name'               => 'Test Mike',
            'email'              => 'test@mike.com',
            'password'           => 'password',
            'image'              => '',
            'phone_number'       => '',
            'mobile_number'      => '',
            'time_zone'          => '',
            'about_the_teacher'  => '',
            'can_schedule_class' => 0,
            'is_active'          => 1,
        ];

        $this->assertEquals($params, $this->request->getParams());
    }
}
