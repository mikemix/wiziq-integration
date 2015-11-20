<?php
namespace mikemix\Wiziq\API;

use mikemix\Wiziq\Common\API\Exception;
use mikemix\Wiziq\Common\API\WiziqSdkInterface;
use mikemix\Wiziq\Entity\Teacher;

class WiziqSdk implements WiziqSdkInterface
{
    /** @var Gateway */
    protected $gateway;

    public function __construct(Gateway $requester)
    {
        $this->gateway = $requester;
    }

    /**
     * {@inheritdoc}
     */
    public function addTeacher(Teacher $teacher)
    {
        return (int)$this->gateway->sendRequest(new Request\AddTeacher($teacher))
            ->add_teacher[0]->teacher_id;
    }

    /**
     * {@inheritdoc}
     */
    public function editTeacher($teacherId, Teacher $teacher)
    {
        $this->gateway->sendRequest(new Request\EditTeacher($teacherId, $teacher));
    }

    /**
     * Get $teacherId details
     *
     * @param int $teacherId Wiziq's teacher ID
     * @return array         Teacher's details
     *
     * @throws Exception\CallException
     */
    public function getTeacherDetails($teacherId)
    {
        $response = (array)$this->gateway->sendRequest(new Request\GetTeacherDetails($teacherId))
            ->get_teacher_details[0]->teacher_details_list[0]->teacher_details[0];

        return [
            'teacher_id'         => (int)$response['teacher_id'],
            'name'               => (string)$response['name'],
            'email'              => (string)$response['email'],
            'password'           => (string)$response['password'],
            'phone_number'       => (string)$response['phone_number'],
            'mobile_number'      => (string)$response['mobile_number'],
            'about_the_teacher'  => (string)$response['about_the_teacher'],
            'image'              => (string)$response['image'],
            'time_zone'          => (string)$response['time_zone'],
            'can_schedule_class' => (bool)(string)$response['can_schedule_class'],
            'is_active'          => (bool)(string)$response['is_active'],
        ];
    }
}
