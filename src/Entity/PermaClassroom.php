<?php
namespace mikemix\Wiziq\Entity;

use mikemix\Wiziq\Entity\Traits\ClassroomTrait;

class PermaClassroom
{
    use ClassroomTrait;

    /**
     * @param string $title
     * @param string $presenterEmail
     */
    private function __construct($title, $presenterEmail)
    {
        $this->title          = (string)$title;
        $this->presenterEmail = (string)$presenterEmail;
    }

    /**
     * @param string $title
     * @param string $presenterEmail
     * @return self
     */
    public static function build($title, $presenterEmail)
    {
        return new self($title, $presenterEmail);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'title'                      => $this->title,
            'presenter_email'            => $this->presenterEmail,
            'attendee_limit'             => $this->attendeeLimit,
            'presenter_default_controls' => $this->presenterDefaultControls,
            'attendee_default_controls'  => $this->attendeeDefaultControls,
            'create_recording'           => $this->createRecording,
            'language_culture_name'      => $this->languageCultureName,
            'return_url'                 => $this->returnUrl,
            'status_ping_url'            => $this->statusPingUrl,
        ];
    }
}
