<?php
namespace mikemix\Wiziq\API;

use mikemix\Wiziq\API\Request;
use mikemix\Wiziq\Common\Api\ClassroomApiInterface;
use mikemix\Wiziq\Entity\Classroom;
use mikemix\Wiziq\Entity\PermaClassroom;

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

        return [
            'class_id'      => (int)$response->create[0]->class_details[0]->class_id,
            'recording_url' => (string)$response->create[0]->class_details[0]->recording_url,
            'presenters'    => $this->getPresentersFromResponse($response)
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function createPermaClas(PermaClassroom $classroom)
    {
        $response = $this->gateway->sendRequest(new Request\CreatePermaClass($classroom));
        $details  = $response->create_perma_class[0]->perma_class_details[0];

        return [
            'class_id'        => (int)$details->class_master_id,
            'attendee_url'    => (string)$details->common_perma_attendee_url,
            'presenter_email' => (string)$details->presenter[0]->presenter_email,
            'presenter_url'   => (string)$details->presenter[0]->presenter_url,
        ];
    }

    /**
     * @param \SimpleXMLElement $response
     * @return array
     */
    protected function getPresentersFromResponse(\SimpleXMLElement $response)
    {
        $presenters = [];
        foreach ($response->create[0]->class_details[0]->presenter_list[0] as $presenter) {
            $presenters[] = [
                'email' => (string)$presenter->presenter_email,
                'url'   => (string)$presenter->presenter_url,
            ];
        }

        return $presenters;
    }
}
