<?php
namespace mikemix\Wiziq\Entity\Traits;

trait ClassroomTrait
{
    private $title;
    private $presenterEmail;
    private $presenterId;
    private $presenterName;
    private $languageCultureName;
    private $attendeeLimit;
    private $presenterDefaultControls;
    private $attendeeDefaultControls;
    private $createRecording;
    private $returnUrl;
    private $statusPingUrl;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }

    /**
     * @param string $value
     * @return self
     */
    public function withPresenterEmail($value)
    {
        $self = clone $this;
        $self->presenterEmail = (string)$value;
        return $self;
    }

    /**
     * @param int    $id
     * @param string $name
     * @return self
     */
    public function withPresenter($id, $name)
    {
        $self = clone $this;
        $self->presenterId   = (int)$id;
        $self->presenterName = (string)$name;
        return $self;
    }

    /**
     * @param string $value
     * @return self
     */
    public function withLanguageCultureName($value)
    {
        $self = clone $this;
        $self->languageCultureName = (string)$value;
        return $self;
    }

    /**
     * @param int $value
     * @return self
     */
    public function withAttendeeLimit($value)
    {
        $self = clone $this;
        $self->attendeeLimit = (int)$value;
        return $self;
    }

    /**
     * @param string $value
     * @return self
     */
    public function withPresenterDefaultControls($value)
    {
        $self = clone $this;
        $self->presenterDefaultControls = (string)$value;
        return $self;
    }

    /**
     * @param string $value
     * @return self
     */
    public function withAttendeeDefaultControls($value)
    {
        $self = clone $this;
        $self->attendeeDefaultControls = (string)$value;
        return $self;
    }

    /**
     * @param bool $value
     * @return self
     */
    public function withCreateRecording($value)
    {
        $self = clone $this;
        $self->createRecording = (int)(bool)$value;
        return $self;
    }

    /**
     * @param string $value
     * @return self
     */
    public function withReturnUrl($value)
    {
        $self = clone $this;
        $self->returnUrl = (string)$value;
        return $self;
    }

    /**
     * @param string $value
     * @return self
     */
    public function withStatusPingUrl($value)
    {
        $self = clone $this;
        $self->statusPingUrl = (string)$value;
        return $self;
    }
}
