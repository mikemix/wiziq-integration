<?php
namespace mikemix\Wiziq\Tests\Service;

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
        $this->teacher = new Teacher(
            'Test Mike',
            'test@mike.com',
            'password',
            'http://g.gl/img.jpg'
        );

        $this->request = new EditTeacher(12345, $this->teacher);
    }

    public function testGetMethodSet()
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
            'image'              => 'http://g.gl/img.jpg',
            'is_active'          => true,
            'phone_number'       => null,
            'mobile_number'      => null,
            'time_zone'          => null,
            'about_the_teacher'  => null,
            'can_schedule_class' => false,
        ];

        $this->assertEquals($params, $this->request->getParams());
    }
}
