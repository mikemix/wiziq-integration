<?php
namespace mikemix\Wiziq\API\Request;

use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\Entity\Teacher;

class AddTeacher implements RequestInterface
{
    /** @var Teacher */
    private $teacher;

    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'add_teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        $params = [
            'name'               => $this->teacher->getName(),
            'email'              => $this->teacher->getEmail(),
            'password'           => $this->teacher->getPassword(),
            'image'              => $this->teacher->getImage(),
            'phone_number'       => $this->teacher->getPhoneNumber(),
            'mobile_number'      => $this->teacher->getMobileNumber(),
            'time_zone'          => $this->teacher->getTimeZone(),
            'about_the_teacher'  => $this->teacher->getAbout(),
            'can_schedule_class' => $this->teacher->getCanScheduleClass(),
            'is_active'          => $this->teacher->getIsActive(),
        ];

        return array_filter($params);
    }
}
