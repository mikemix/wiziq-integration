<?php
namespace mikemix\Wiziq\Tests\ValueObject;

use mikemix\Wiziq\ValueObject\Teacher;

class TeacherTest extends \PHPUnit_Framework_TestCase
{
    public function testCannotScheduleClassByDefault()
    {
        $object = new Teacher('Mike Test', 'mike@test.com', 'password');

        $this->assertFalse($object->getCanScheduleClass());
    }

    public function testIsActiveByDefault()
    {
        $object = new Teacher('Mike Test', 'mike@test.com', 'password');

        $this->assertTrue($object->getIsActive());
    }

    public function testItDoesNotAllowWithoutName()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        new Teacher('  ', 'mike@test.com', 'password');
    }

    public function testItDoesNotAllowTooLongName()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        new Teacher(str_repeat('A', 51), 'mike@test.com', 'password');
    }

    public function testItDoesNotAllowTooShortPassword()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        new Teacher('Mike Test', 'mike@test.com', 'passw');
    }

    public function testItDoesNotAllowTooLongPassword()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        new Teacher('Mike Test', 'mike@test.com', str_repeat('A', 16));
    }

    public function testItDoesNotAllowInvalidEmail()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        new Teacher('Mike Test', 'mike@test', 'password');
    }

    public function testItDoesNotAllowInvalidPhoneNumber()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        new Teacher('Mike Test', 'mike@test', 'password', '', '+48 24 50 60 70');
    }

    public function testItDoesNotAllowInvalidMobileNumber()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        new Teacher('Mike Test', 'mike@test', 'password', '', '+48500600700');
    }

    public function testItDoesNotAllowInvalidTimeZone()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        new Teacher('Mike Test', 'mike@test', 'password', '', '+48 500600700', '+48 500600700', 'Europe/Kiev');
    }

    public function testTooString()
    {
        $object = new Teacher('Mike Test', 'mike@test.com', 'password');

        $this->assertEquals('Mike Test (mike@test.com)', $object->__toString());
    }

    public function testEquals()
    {
        $object1 = new Teacher('Mike1 Test', 'mike1@test.com', 'password');
        $object2 = new Teacher('Mike2 Test', 'mike2@test.com', 'password');
        $object3 = new Teacher('Mike1 Test', 'mike1@test.com', 'password');

        $this->assertTrue($object1->equals($object3));
        $this->assertFalse($object1->equals($object2));
    }

    public function testGetters()
    {
        $object = new Teacher(
            'Mike Test',
            'mike@test.com',
            'password',
            'http://g.gl/a.png',
            '+1 1234567890',
            '+1 0987654321',
            'Europe/Warsaw',
            'about',
            true,
            false
        );

        $this->assertEquals('Mike Test', $object->getName());
        $this->assertEquals('mike@test.com', $object->getEmail());
        $this->assertEquals('password', $object->getPassword());
        $this->assertEquals('http://g.gl/a.png', $object->getImage());
        $this->assertEquals('+1 1234567890', $object->getPhoneNumber());
        $this->assertEquals('+1 0987654321', $object->getMobileNumber());
        $this->assertEquals('Europe/Warsaw', $object->getTimeZone());
        $this->assertEquals('about', $object->getAbout());
        $this->assertEquals(true, $object->getCanScheduleClass());
        $this->assertEquals(false, $object->getIsActive());
    }
}
