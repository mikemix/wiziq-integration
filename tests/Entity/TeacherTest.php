<?php
namespace mikemix\Wiziq\Tests\Entity;

use mikemix\Wiziq\Entity\Teacher;

class TeacherTest extends \PHPUnit_Framework_TestCase
{
    /** @var Teacher */
    private $entity;

    /** @var array */
    private $expected;

    public function setUp()
    {
        $this->entity = Teacher::build('Mike Test', 'mike@test.com', 'password');

        $this->expected = [
            'name'               => 'Mike Test',
            'email'              => 'mike@test.com',
            'password'           => 'password',
            'image'              => '',
            'phone_number'       => '',
            'mobile_number'      => '',
            'time_zone'          => '',
            'about_the_teacher'  => '',
            'can_schedule_class' => 0,
            'is_active'          => 1,
        ];
    }

    public function testBuildBasic()
    {
        $this->assertEquals($this->expected, $this->entity->toArray());
    }

    public function testBuildWithImage()
    {
        $this->expected['image'] = 'image.jpg';
        $newEntity = $this->entity->withImage($this->expected['image']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithPhoneNumber()
    {
        $this->expected['phone_number'] = '+44 1002003004';
        $newEntity = $this->entity->withPhoneNumber($this->expected['phone_number']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithMobileNumber()
    {
        $this->expected['mobile_number'] = '+44 1002003004';
        $newEntity = $this->entity->withMobileNumber($this->expected['mobile_number']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithTimeZone()
    {
        $this->expected['time_zone'] = 'Europe/Warsaw';
        $newEntity = $this->entity->withTimeZone($this->expected['time_zone']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithAboutTheTeacher()
    {
        $this->expected['about_the_teacher'] = 'about';
        $newEntity = $this->entity->withAbout($this->expected['about_the_teacher']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithCanScheduleClass()
    {
        $this->expected['can_schedule_class'] = 1;
        $newEntity = $this->entity->withCanScheduleClass(true);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithIsActive()
    {
        $this->expected['is_active'] = 0;
        $newEntity = $this->entity->withIsActive(false);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }
}
