<?php
namespace mikemix\Wiziq\Tests\API\Request;

use mikemix\Wiziq\API\Request\AddTeacher;
use mikemix\Wiziq\Entity\Teacher;

class AddTeacherTest extends \PHPUnit_Framework_TestCase
{
    /** @var Teacher */
    private $teacher;

    /** @var AddTeacher */
    private $request;

    public function setUp()
    {
        $this->teacher = new Teacher('Test Mike', 'test@mike.com', 'password');
        $this->request = new AddTeacher($this->teacher);
    }

    public function testGetMethod()
    {
        $this->assertEquals('add_teacher', $this->request->getMethod());
    }

    public function testGetParams()
    {
        $params = [
            'name'      => 'Test Mike',
            'email'     => 'test@mike.com',
            'password'  => 'password',
            'is_active' => 1,
        ];

        $this->assertEquals($params, $this->request->getParams());
    }
}
