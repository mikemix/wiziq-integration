<?php
namespace mikemix\Wiziq\Common\Api;

use mikemix\Wiziq\Entity\Classroom;

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
     *        ['email' => 'tsb.kid@gmail.com', 'url' => 'http://live.wiziq.com/aliveext/LoginToSession.aspx?SessionCode=Mk5wx06KmZg%3d'],
     *        ...
     *    ]
     * ]
     *
     * @param Classroom $classroom
     * @return array Created classroom details
     *
     * @throws Exception\CallException
     */
    public function create(Classroom $classroom);
}
