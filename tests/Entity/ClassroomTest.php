<?php
namespace mikemix\Wiziq\Tests\Entity;

use mikemix\Wiziq\Entity\Classroom;

class ClassroomTest extends \PHPUnit_Framework_TestCase
{
    /** @var Classroom */
    private $entity;

    /** @var array */
    private $expected = [
        'title'                      => 'Title',
        'start_time'                 => '12/30/2015 12:30:40',
        'language_culture_name'      => '',
        'extend_duration'            => '',
        'duration'                   => '',
        'time_zone'                  => '',
        'attendee_limit'             => '',
        'presenter_default_controls' => '',
        'attendee_default_controls'  => '',
        'create_recording'           => '',
        'return_url'                 => '',
        'status_ping_url'            => '',
        'presenter_id'               => 123,
        'presenter_name'             => 'mike@test.com',
    ];

    public function setUp()
    {
        $this->entity = Classroom::build('Title', new \DateTime('2015-12-30 12:30:40'))
            ->withPresenter(123, 'mike@test.com');
    }

    public function testBuildBasic()
    {
        $this->assertEquals($this->expected, $this->entity->toArray());
    }

    public function testBuildWithPresenterEmail()
    {
        unset($this->expected['presenter_id']);
        unset($this->expected['presenter_name']);

        $this->expected['presenter_email'] = 'mike@test.com';
        $newEntity = $this->entity->withPresenterEmail($this->expected['presenter_email']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithLanguageCultureName()
    {
        $this->expected['language_culture_name'] = 'en-EN';
        $newEntity = $this->entity->withLanguageCultureName($this->expected['language_culture_name']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithExtendDuration()
    {
        $this->expected['extend_duration'] = 60;
        $newEntity = $this->entity->withExtendDuration($this->expected['extend_duration']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithDuration()
    {
        $this->expected['duration'] = 60;
        $newEntity = $this->entity->withDuration($this->expected['duration']);

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

    public function testBuildWithAttendeeLimit()
    {
        $this->expected['attendee_limit'] = 10;
        $newEntity = $this->entity->withAttendeeLimit($this->expected['attendee_limit']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithPresenterDefaultControls()
    {
        $this->expected['presenter_default_controls'] = 'video, audio';
        $newEntity = $this->entity->withPresenterDefaultControls($this->expected['presenter_default_controls']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithAttendeeDefaultControls()
    {
        $this->expected['attendee_default_controls'] = 'video, audio';
        $newEntity = $this->entity->withAttendeeDefaultControls($this->expected['attendee_default_controls']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithCreateRecording()
    {
        $this->expected['create_recording'] = 'false';
        $newEntity = $this->entity->withCreateRecording(false);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);

        $this->expected['create_recording'] = 'true';
        $newEntity = $this->entity->withCreateRecording(true);

        $this->assertEquals($this->expected, $newEntity->toArray());
    }

    public function testBuildWithReturnUrl()
    {
        $this->expected['return_url'] = 'http://some.url/script.php';
        $newEntity = $this->entity->withReturnUrl($this->expected['return_url']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithStatusPingUrl()
    {
        $this->expected['status_ping_url'] = 'http://some.url/script.php';
        $newEntity = $this->entity->withStatusPingUrl($this->expected['status_ping_url']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }
}
