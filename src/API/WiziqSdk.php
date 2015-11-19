<?php
namespace mikemix\Wiziq\API;

use mikemix\Wiziq\Common\Api\WiziqSdkInterface;
use mikemix\Wiziq\Entity\Teacher;

class WiziqSdk implements WiziqSdkInterface
{
    /** @var Gateway */
    protected $requester;

    public function __construct(Gateway $requester)
    {
        $this->requester = $requester;
    }

    /**
     * {@inheritdoc}
     */
    public function addTeacher(Teacher $teacher)
    {
        $response = $this->requester->sendRequest(new Request\AddTeacher($teacher));
        if (!$response->isSuccess()) {
            throw Exception\TeacherNotAddedException::with($response);
        }

        return (int)$response->add_teacher[0]->teacher_id;
    }
}
