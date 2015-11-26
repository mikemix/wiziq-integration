<?php
namespace mikemix\Wiziq\Entity;

use mikemix\Wiziq\Entity\Traits\ClassroomTrait;

class PermaClassroom
{
    use ClassroomTrait;

    /**
     * @param string $title
     */
    private function __construct($title)
    {
        $this->title = (string)$title;
    }

    /**
     * @param string $title
     * @return self
     */
    public static function build($title)
    {
        return new self($title);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $params = [
            'title'                      => $this->title,
            'attendee_limit'             => $this->attendeeLimit,
            'presenter_default_controls' => $this->presenterDefaultControls,
            'attendee_default_controls'  => $this->attendeeDefaultControls,
            'create_recording'           => $this->createRecording,
            'language_culture_name'      => $this->languageCultureName,
            'return_url'                 => $this->returnUrl,
            'status_ping_url'            => $this->statusPingUrl,
        ];

        if ($this->presenterEmail) {
            $params['presenter_email'] = $this->presenterEmail;
        } else {
            $params['presenter_id']   = $this->presenterId;
            $params['presenter_name'] = $this->presenterName;
        }

        return $params;
    }
}
