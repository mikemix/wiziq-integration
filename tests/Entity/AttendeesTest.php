<?php
namespace mikemix\Wiziq\Tests\Entity;

use mikemix\Wiziq\Entity\Attendees;

class AttendeesTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_builds_and_converts_to_array()
    {
        $entity = Attendees::build()
            ->add(123, 'Mike')
            ->add(500, 'Andrew', 'pl-PL')
            ->add(999, 'Susan', 'pt-BR');

        $this->assertEquals([
            ['id' => 123, 'name' => 'Mike', 'lang' => 'en-US'],
            ['id' => 500, 'name' => 'Andrew', 'lang' => 'pl-PL'],
            ['id' => 999, 'name' => 'Susan', 'lang' => 'pt-BR'],
        ], $entity->toArray());
    }

    public function test_it_casts_to_proper_types()
    {
        $entity = Attendees::build()->add('123', 'Mike');

        $this->assertSame(123, $entity->toArray()[0]['id']);
    }

    public function test_it_is_immutable()
    {
        $entity  = Attendees::build();
        $another = $entity->add(100, 'Mike');

        $this->assertNotSame($entity, $another);
    }

    public function test_it_converts_to_xml_string()
    {
        $entity = Attendees::build()
            ->add(123, 'Mike')
            ->add(500, 'Andrew', 'pl-PL');

        $expectedString = <<<Attendees
<attendee_list>
  <attendee>
    <attendee_id><![CDATA[123]]></attendee_id>
    <screen_name><![CDATA[Mike]]></screen_name>
    <language_culture_name><![CDATA[en-US]]></language_culture_name>
  </attendee>
  <attendee>
    <attendee_id><![CDATA[500]]></attendee_id>
    <screen_name><![CDATA[Andrew]]></screen_name>
    <language_culture_name><![CDATA[pl-PL]]></language_culture_name>
  </attendee>
</attendee_list>
Attendees;

        $expected = preg_replace('/\s/', '', $expectedString);
        $actual   = preg_replace('/\s/', '', $entity->toXmlString());

        $this->assertEquals($expected, $actual);
    }
}
