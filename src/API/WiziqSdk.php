<?php
namespace mikemix\Wiziq\API;

use mikemix\Wiziq\Common\Api\Exception;
use mikemix\Wiziq\Common\Api\RequestInterface;
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
        return (int)$this->makeCall(new Request\AddTeacher($teacher))
            ->add_teacher[0]->teacher_id;
    }

    /**
     * {@inheritdoc}
     */
    public function editTeacher($teacherId, Teacher $teacher)
    {
        $this->makeCall(new Request\EditTeacher($teacherId, $teacher));
    }

    /**
     * @param RequestInterface $request
     * @return \SimpleXMLElement|object
     */
    private function makeCall(RequestInterface $request)
    {
        $response = $this->requester->sendRequest($request);
        if (!$response->isSuccess()) {
            throw Exception\CallException::from($response);
        }

        return $response->getResponse();
    }
}
