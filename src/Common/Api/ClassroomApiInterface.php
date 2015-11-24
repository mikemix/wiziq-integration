<?php
namespace mikemix\Wiziq\Common\Api;

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
     *    'presenters' => [
     *        ['email' => 'tsb.kid@gmail.com', 'url' => 'http://live.wiziq.com/aliveext/LoginToSession.aspx'],
     *        // more presenters if any
     *    ]
     * ]
     *
     * @param Classroom $classroom
     * @return array Created classroom details
     *
     * @throws Exception\CallException
     */
    public function create(Classroom $classroom);

    /**
     * Create a permament class
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
     * @return array Created classroom details
     *
     * @throws Exception\CallException
     */
    public function createPermaClas(PermaClassroom $classroom);
}
