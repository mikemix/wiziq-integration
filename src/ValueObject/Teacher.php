<?php
namespace mikemix\Wiziq\ValueObject;

/**
 * Teacher VO
 * @see http://developer.wiziq.com/teacher/method/add_teacher
 */
class Teacher
{
    /** @var string */
    private $name, $email, $password, $image, $phoneNumber, $mobileNumber, $timeZone, $about;

    /** @var bool */
    private $canScheduleClass, $isActive;

    public function __construct(
        $name,
        $email,
        $password,
        $image = null,
        $phoneNumber = null,
        $mobileNumber = null,
        $timeZone = null,
        $about = null,
        $canScheduleClass = false,
        $isActive = true
    ) {
        $name = trim($name);

        if (!$name || strlen($name) > 50) {
            throw new \InvalidArgumentException(
                'Please pass valid name parameter not more than 50 characters.'
            );
        }

        $passwordLength = strlen(trim($password));
        if ($passwordLength < 6 || $passwordLength > 15) {
            throw new \InvalidArgumentException(
                'Password with Spaces, with less than 6 characters length and more than 15 characters is not allowed.'
            );
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException('Invalid email address');
        }

        if ($phoneNumber && !preg_match('/\+\d{1,3}\ \d{9,10}/', $phoneNumber)) {
            throw new \InvalidArgumentException(
                'Please pass valid work phone with country code or leave blank. For example:+44 9999999999.'
            );
        }

        if ($mobileNumber && !preg_match('/\+\d{1,3}\ \d{9,10}/', $mobileNumber)) {
            throw new \InvalidArgumentException(
                'Please pass valid work phone with country code or leave blank. For example:+44 9999999999.'
            );
        }

        if ($timeZone && !in_array($timeZone, \DateTimeZone::listIdentifiers())) {
            throw new \InvalidArgumentException('Invalid timezone');
        }

        $this->name             = $name;
        $this->email            = $email;
        $this->password         = $password;
        $this->image            = $image;
        $this->phoneNumber      = $phoneNumber;
        $this->mobileNumber     = $mobileNumber;
        $this->timeZone         = $timeZone;
        $this->about            = $about;
        $this->canScheduleClass = $canScheduleClass;
        $this->isActive         = $isActive;
    }

    /**
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * @return boolean
     */
    public function getCanScheduleClass()
    {
        return $this->canScheduleClass;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @return string
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s (%s)', $this->name, $this->email);
    }

    /**
     * @param Teacher $teacher
     * @return bool
     */
    public function equals(Teacher $teacher)
    {
        return $this->email === $teacher->getEmail();
    }
}
