<?php
namespace mikemix\Wiziq\Entity;

/**
 * The teacher
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
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setImage($image);
        $this->setPhoneNumber($phoneNumber);
        $this->setMobileNumber($mobileNumber);
        $this->setTimeZone($timeZone);
        $this->setAbout($about);
        $this->setCanScheduleclass($canScheduleClass);
        $this->setIsActive($isActive);
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

    /**
     * @param string $name
     */
    private function setName($name)
    {
        $name = trim($name);

        if (!$name || strlen($name) > 50) {
            throw new \InvalidArgumentException(
                'Please pass valid name parameter not more than 50 characters.'
            );
        }

        $this->name = $name;
    }

    /**
     * @param string $email
     */
    private function setEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException('Invalid email address');
        }

        $this->email = $email;
    }

    /**
     * @param string $password
     */
    private function setPassword($password)
    {
        $passwordLength = strlen(trim($password));
        if ($passwordLength < 6 || $passwordLength > 15) {
            throw new \InvalidArgumentException(
                'Password with Spaces, with less than 6 characters length and more than 15 characters is not allowed.'
            );
        }

        $this->password = $password;
    }

    /**
     * @param string $about
     */
    private function setAbout($about = null)
    {
        $this->about = $about;
    }

    /**
     * @param boolean $canScheduleClass
     */
    private function setCanScheduleClass($canScheduleClass)
    {
        $this->canScheduleClass = (bool)$canScheduleClass;
    }

    /**
     * @param string $image
     */
    private function setImage($image = null)
    {
        $this->image = $image;
    }

    /**
     * @param boolean $isActive
     */
    private function setIsActive($isActive)
    {
        $this->isActive = (bool)$isActive;
    }

    /**
     * @param string $mobileNumber
     */
    private function setMobileNumber($mobileNumber)
    {
        if ($mobileNumber && !preg_match('/\+\d{1,3}\ \d{9,10}/', $mobileNumber)) {
            throw new \InvalidArgumentException(
                'Please pass valid work phone with country code or leave blank. For example:+44 9999999999.'
            );
        }

        $this->mobileNumber = $mobileNumber;
    }

    /**
     * @param string $phoneNumber
     */
    private function setPhoneNumber($phoneNumber = null)
    {
        if ($phoneNumber && !preg_match('/\+\d{1,3}\ \d{9,10}/', $phoneNumber)) {
            throw new \InvalidArgumentException(
                'Please pass valid work phone with country code or leave blank. For example:+44 9999999999.'
            );
        }

        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @param string $timeZone
     */
    private function setTimeZone($timeZone = null)
    {
        if ($timeZone && !in_array($timeZone, \DateTimeZone::listIdentifiers())) {
            throw new \InvalidArgumentException('Invalid timezone');
        }

        $this->timeZone = $timeZone;
    }
}
