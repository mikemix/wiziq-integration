<?php
namespace mikemix\Wiziq\Entity;

class Teacher
{
    /** @var string */
    private $name;

    /** @var string */
    private $email;

    /** @var string */
    private $password;

    /** @var string */
    private $image = '';

    /** @var string */
    private $phoneNumber = '';

    /** @var string */
    private $mobileNumber = '';

    /** @var string */
    private $timeZone = '';

    /** @var string */
    private $about = '';

    /** @var int */
    private $canScheduleClass = 0;

    /** @var int */
    private $isActive = 1;


    public function __construct($name, $email, $password)
    {
        $this->name     = (string)$name;
        $this->email    = (string)$email;
        $this->password = (string)$password;
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return Teacher
     */
    public static function build($name, $email, $password)
    {
        return new self($name, $email, $password);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s (%s)', $this->name, $this->email);
    }

    /**
     * @param string $image
     * @return self
     */
    public function withImage($image)
    {
        $self = clone $this;
        $self->image = (string)$image;

        return $self;
    }

    /**
     * @param string $phoneNumber
     * @return self
     */
    public function withPhoneNumber($phoneNumber)
    {
        $self = clone $this;
        $self->phoneNumber = (string)$phoneNumber;

        return $self;
    }

    /**
     * @param string $mobileNumber
     * @return self
     */
    public function withMobileNumber($mobileNumber)
    {
        $self = clone $this;
        $self->mobileNumber = (string)$mobileNumber;

        return $self;
    }

    /**
     * @param string $timeZone
     * @return self
     */
    public function withTimeZone($timeZone)
    {
        $self = clone $this;
        $self->timeZone = (string)$timeZone;

        return $self;
    }

    /**
     * @param string $about
     * @return self
     */
    public function withAbout($about)
    {
        $self = clone $this;
        $self->about = (string)$about;

        return $self;
    }

    /**
     * @param string $canScheduleClass
     * @return self
     */
    public function withCanScheduleClass($canScheduleClass)
    {
        $self = clone $this;
        $self->canScheduleClass = (int)(bool)$canScheduleClass;

        return $self;
    }

    /**
     * @param string $isActive
     * @return self
     */
    public function withIsActive($isActive)
    {
        $self = clone $this;
        $self->isActive = (int)(bool)$isActive;

        return $self;
    }

    public function toArray()
    {
        return [
            'name'               => $this->name,
            'email'              => $this->email,
            'password'           => $this->password,
            'image'              => $this->image,
            'phone_number'       => $this->phoneNumber,
            'mobile_number'      => $this->mobileNumber,
            'time_zone'          => $this->timeZone,
            'about_the_teacher'  => $this->about,
            'can_schedule_class' => $this->canScheduleClass,
            'is_active'          => $this->isActive,
        ];
    }
}
