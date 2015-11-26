<?php
namespace mikemix\Wiziq\API\Request;

use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\Entity\Attendees;

class AddAttendees implements RequestInterface
{
    /** @var int */
    private $classroomId;

    /** @var Attendees */
    private $attendees;

    public function __construct($classroomId, Attendees $attendees)
    {
        $this->classroomId = $classroomId;
        $this->attendees   = $attendees;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'add_attendees';
    }

    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        return [
            'class_id'      => $this->classroomId,
            'attendee_list' => $this->attendees->toXmlString()
        ];
    }
}
