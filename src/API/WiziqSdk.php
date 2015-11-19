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
        return $this->requester->sendRequest(new Request\AddTeacher($teacher));
    }
}
