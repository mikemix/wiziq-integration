<?php
namespace mikemix\Wiziq\API;

use mikemix\Wiziq\API\Request;
use mikemix\Wiziq\Common\Api\ClassroomApiInterface;
use mikemix\Wiziq\Entity\Classroom;

class ClassroomApi implements ClassroomApiInterface
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
    public function create(Classroom $classroom)
    {
        $response = $this->gateway->sendRequest(new Request\Create($classroom));

        $presenters = [];
        foreach ($response->create[0]->class_details[0]->presenter_list[0] as $presenter) {
            $presenters[] = [
                'email' => (string)$presenter->presenter_email,
                'url'   => (string)$presenter->presenter_url,
            ];
        }

        return [
            'class_id'      => (int)$response->create[0]->class_details[0]->class_id,
            'recording_url' => (string)$response->create[0]->class_details[0]->recording_url,
            'presenters' => $presenters
        ];
    }
}
