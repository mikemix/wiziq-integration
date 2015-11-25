<?php
namespace mikemix\Wiziq\Entity;

class Attendees
{
    /** @var array */
    private $list = [];

    /**
     * @return Attendees
     */
    public static function build()
    {
        return new self();
    }

    /**
     * @param int    $id
     * @param string $name
     * @param string $languageCultureName
     * @return Attendees
     */
    public function add($id, $name, $languageCultureName = 'en-US')
    {
        $self = clone $this;
        $self->list[] = ['id' => (int)$id, 'name' => (string)$name, 'lang' => (string)$languageCultureName];

        return $self;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->list;
    }

    /**
     * @return string
     */
    public function toXmlString()
    {
        $attendees = [];

        foreach ($this->list as $attendee) {
            $attendees[] = sprintf(
                '<attendee><attendee_id><![CDATA[%d]]></attendee_id>' .
                '<screen_name><![CDATA[%s]]></screen_name>' .
                '<language_culture_name><![CDATA[%s]]></language_culture_name></attendee>',
                $attendee['id'],
                $attendee['name'],
                $attendee['lang']
            );
        }

        return sprintf('<attendee_list>%s</attendee_list>', implode('', $attendees));
    }
}
