<?php
namespace mikemix\Wiziq\Tests\Entity;

use mikemix\Wiziq\Entity\Classroom;

class ClassroomTest extends \PHPUnit_Framework_TestCase
{
    /** @var Classroom */
    private $entity;

    /** @var array */
    private $expected;

    public function setUp()
    {
        $this->entity = Classroom::build('Title', new \DateTime('2015-12-30 12:30:40'), 'mike@test.com');

        $this->expected = [
            'title'           => 'Title',
            'start_time'      => '30/12/2015 12:30:40',
            'presenter_email' => 'mike@test.com',
        ];
    }

    public function testBuildBasic()
    {
        $this->assertEquals($this->expected, $this->entity->toArray());
    }
}
