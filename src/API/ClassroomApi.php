<?php
namespace mikemix\Wiziq\API;

use mikemix\Wiziq\API\Request;
use mikemix\Wiziq\Common\Api\ClassroomApiInterface;
use mikemix\Wiziq\Entity\Attendees;
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
        $response = $this->gateway->sendRequest(new Request\Create($classroom))
            ->create[0]->class_details[0];

        return [
            'class_id'        => (int)$response->class_id,
            'recording_url'   => (string)$response->recording_url,
            'presenter_email' => (string)$response->presenter_list[0]->presenter[0]->presenter_email,
            'presenter_url'   => (string)$response->presenter_list[0]->presenter[0]->presenter_url,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function modify($classroomId, Classroom $classroom)
    {

        $response = (boolean)$this->gateway->sendRequest(new Request\Modify($classroomId, $classroom))->modify["status"];

        return $response;
    }
     /**
     * {@inheritdoc}
     */
    public function download($classroomId, $recordingFormat = 'zip')
    {

        $response = $this->gateway->sendRequest(new Request\Download($classroomId, $recordingFormat))->download_recording;

        return $response;
    }
    /**
     * {@inheritdoc}
     */
    public function cancel($classroomId)
    {
        $response = (boolean)$this->gateway->sendRequest(new Request\Cancel($classroomId))->cancel['status'];
        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function getAttendanceReport($classroomId)
    {
        $attendance = [];

        $response = $this->gateway->sendRequest(new Request\AttendanceReport($classroomId))->get_attendance_report;

        foreach($response->attendee_list[0] as $attendee) {
            $data = [
                    'entry_time'       => (string)$attendee->entry_time,
                    'exit_time'        => (string)$attendee->exit_time,
                    'attended_minutes' => (string)$attendee->attended_minutes,
                    ];
            if(isset($attendee['presenter']) and $attendee['presenter']==true) {
                $data['presenter_id'] = (int)$attendee->presenter_id;
            } else {
                $data['attendee_id'] = (int)$attendee->attendee_id;
            }

            $attendance[] = $data;
        }

        return $attendance;
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
     * {@inheritdoc}
     */
    public function addAttendeesToClass($classroomId, Attendees $attendees)
    {
        $response = $this->gateway->sendRequest(new Request\AddAttendees($classroomId, $attendees));
        $result   = [];

        foreach ($response->add_attendees[0]->attendee_list[0] as $attendee) {
            $result[] = ['id' => (int)$attendee->attendee_id, 'url' => (string)$attendee->attendee_url];
        }

        return $result;
    }

    /**
     * @codeCoverageIgnore
     * @param \SimpleXMLElement $response
     * @return array
     */
    protected function getPresentersFromResponse(\SimpleXMLElement $response)
    {
        $presenters = [];
        foreach ($response->presenter_list[0] as $presenter) {
            $presenters[] = [
                'email' => (string)$presenter->presenter_email,
                'url'   => (string)$presenter->presenter_url,
            ];
        }

        return $presenters;
    }
}
