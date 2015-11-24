<?php
namespace mikemix\Wiziq\Entity;

class Classroom
{
    /** @var string */
    private $title;

    /** @var \DateTime */
    private $startTime;

    /** @var string */
    private $presenterEmail;

    /**
     * @param string    $title
     * @param \DateTime $startTime
     * @param string    $presenterEmail
     */
    private function __construct($title, \DateTime $startTime, $presenterEmail)
    {
        $this->title          = (string)$title;
        $this->startTime      = $startTime->format('d/m/Y H:i:s');
        $this->presenterEmail = (string)$presenterEmail;
    }

    /**
     * @param string    $title
     * @param \DateTime $startTime
     * @param string    $presenterEmail
     * @return self
     */
    public static function build($title, \DateTime $startTime, $presenterEmail)
    {
        return new self($title, $startTime, $presenterEmail);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'title'               => $this->title,
            'start_time'              => $this->startTime,
            'presenter_email'           => $this->presenterEmail,
        ];
    }
}
