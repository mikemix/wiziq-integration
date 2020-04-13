<?php
namespace mikemix\Wiziq\API\Request;

use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\Entity\Classroom;

class AttendanceReport implements RequestInterface
{
    /** @var ClassroomId */
    private $classroomId;

    public function __construct($classroomId)
    {
        $this->classroomId = $classroomId;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'get_attendance_report';
    }

    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
       return ['class_id' => $this->classroomId];
    }
}
