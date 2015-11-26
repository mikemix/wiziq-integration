<?php
namespace mikemix\Wiziq\Common\Api;

use mikemix\Wiziq\Entity\Attendees;
use mikemix\Wiziq\Entity\Classroom;
use mikemix\Wiziq\Entity\PermaClassroom;

interface ClassroomApiInterface
{
    /**
     * Schedule a class
     *
     * @see http://developer.wiziq.com/class/method/create
     * Returned response is an array as follows:
     * [
     *    'class_id' => 15716,
     *    'recording_url' => 'http://live.wiziq.com/aliveext/Recorded.aspx?SessionCode=pqcTxHXEgSU%3d',
     *    'presenter_email' => 'tsb.kid@gmail.com',
     *    'presenter_url' => 'http://live.wiziq.com/aliveext/LoginToSession.aspx'
     * ]
     *
     * @param Classroom $classroom
     *
     * @return array Created classroom details
     *
     * @throws Exception\CallException
     */
    public function create(Classroom $classroom);

    /**
     * Cancel a class
     *
     * @see http://developer.wiziq.com/class/method/cancel
     *
     * @param int       $classroomId Classroom ID
     *
     * @return void
     *
     * @throws Exception\CallException
     */
    public function cancel($classroomId);

    /**
     * Create a permanent class
     *
     * @see http://developer.wiziq.com/class/method/create_perma_class
     * Returned response is an array as follows:
     * [
     *    'class_id'        => 15716,
     *    'attendee_url'    => 'https://www.wiziq.com/class/launch.aspx?%2fpbeqQWORwi%2b839eB3qJlZr%2bIkG1It',
     *    'presenter_email' => 'tsb.kid@gmail.com',
     *    'presenter_url'   => 'https://www.wiziq.com/class/launch.aspx?nVnDx7oTA%2bmTJwBNnZO9GCwZdS7yUDhmpb0twttP',
     * ]
     *
     * @param PermaClassroom $classroom
     *
     * @return array Created classroom details
     *
     * @throws Exception\CallException
     */
    public function createPermaClas(PermaClassroom $classroom);

    /**
     * Add attendees to class (not permanent one).
     *
     * @see http://developer.wiziq.com/class/method/add_attendees
     * Returned response is an array of added attendees as follows:
     * [
     *    ['id' => 101, 'url' => 'http://live.wiziq.com/aliveext/LoginToSession.aspx?SessionCode=YYY2cjbYX...',
     *    ['id' => 102, 'url' => 'http://live.wiziq.com/aliveext/LoginToSession.aspx?SessionCode=XXX2cjbYX...',
     *    // more attendees if any
     * ]
     *
     * @param int       $classroomId Classroom ID
     * @param Attendees $attendees Attendee list
     *
     * @return array Added attendee list
     *
     * @throws Exception\CallException
     */
    public function addAttendeesToClass($classroomId, Attendees $attendees);
}
