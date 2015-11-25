<?php
namespace mikemix\Wiziq\Entity;

use mikemix\Wiziq\Entity\Traits\ClassroomTrait;

class Classroom
{
    use ClassroomTrait;
    
    /** @var string */
    private $startTime;

    /** @var int */
    private $duration;

    /** @var int */
    private $extendDuration;

    /** @var string */
    private $timeZone;

    /**
     * @param string    $title
     * @param string    $presenterEmail
     * @param \DateTime $startTime
     */
    private function __construct($title, $presenterEmail, \DateTime $startTime)
    {
        $this->title          = (string)$title;
        $this->presenterEmail = (string)$presenterEmail;
        $this->startTime      = $startTime->format('m/d/Y H:i:s');
    }

    /**
     * @param string    $title
     * @param string    $presenterEmail
     * @param \DateTime $startTime
     * @return self
     */
    public static function build($title, $presenterEmail, \DateTime $startTime)
    {
        return new self($title, $presenterEmail, $startTime);
    }

    /**
     * @param int $value
     * @return self
     */
    public function withDuration($value)
    {
        $self = clone $this;
        $self->duration = (int)$value;

        return $self;
    }

    /**
     * @param int $value
     * @return self
     */
    public function withExtendDuration($value)
    {
        $self = clone $this;
        $self->extendDuration = (int)$value;

        return $self;
    }

    /**
     * @param string $value
     * @return self
     */
    public function withTimeZone($value)
    {
        $self = clone $this;
        $self->timeZone = (string)$value;

        return $self;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'title'                      => $this->title,
            'start_time'                 => $this->startTime,
            'presenter_email'            => $this->presenterEmail,
            'language_culture_name'      => $this->languageCultureName,
            'extend_duration'            => $this->extendDuration,
            'duration'                   => $this->duration,
            'time_zone'                  => $this->timeZone,
            'attendee_limit'             => $this->attendeeLimit,
            'presenter_default_controls' => $this->presenterDefaultControls,
            'attendee_default_controls'  => $this->attendeeDefaultControls,
            'create_recording'           => $this->createRecording,
            'return_url'                 => $this->returnUrl,
            'status_ping_url'            => $this->statusPingUrl,
        ];
    }
}
