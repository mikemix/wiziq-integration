<?php
namespace mikemix\Wiziq\Service;

use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\Common\Service\AddTeacherInterface;
use mikemix\Wiziq\ValueObject\Teacher;

final class AddTeacher implements AddTeacherInterface
{
    /** @var RequestInterface */
    private $request;

    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * {@inheritdoc}
     */
    public function addTeacher(Teacher $teacher)
    {
        $params = [
            'name'               => $teacher->getName(),
            'email'              => $teacher->getEmail(),
            'password'           => $teacher->getPassword(),
            'image'              => $teacher->getImage(),
            'phone_number'       => $teacher->getPhoneNumber(),
            'mobile_number'      => $teacher->getMobileNumber(),
            'time_zone'          => $teacher->getTimeZone(),
            'about_the_teacher'  => $teacher->getAbout(),
            'can_schedule_class' => $teacher->getCanScheduleClass(),
            'is_active'          => $teacher->getIsActive(),
        ];

        return $this->request->doRequest('add_teacher', array_filter($params));
    }
}
