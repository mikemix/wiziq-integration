<?php
namespace mikemix\Wiziq\Entity;

class Classroom
{
    /** @var string */
    private $title;

    /** @var string */
    private $presenterEmail;

    /** @var string */
    private $startTime;

    /**
     * @param string    $title
     * @param string    $presenterEmail
     * @param \DateTime $startTime
     */
    private function __construct($title, $presenterEmail, \DateTime $startTime)
    {
        $this->title          = (string)$title;
        $this->presenterEmail = (string)$presenterEmail;
        $this->startTime      = $startTime->format('d/m/Y H:i:s');
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
            'title'           => $this->title,
            'start_time'      => $this->startTime,
            'presenter_email' => $this->presenterEmail,
        ];
    }
}
