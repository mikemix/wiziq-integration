<?php
namespace mikemix\Wiziq\Entity\Traits;

trait ClassroomTrait
{
    /** @var string */
    private $title;

    /** @var string */
    private $presenterEmail;

    /** @var string */
    private $languageCultureName;

    /** @var int */
    private $attendeeLimit;

    /** @var string */
    private $presenterDefaultControls;

    /** @var string */
    private $attendeeDefaultControls;

    /** @var int */
    private $createRecording;

    /** @var string */
    private $returnUrl;

    /** @var string */
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
