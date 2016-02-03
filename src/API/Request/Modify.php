<?php
namespace mikemix\Wiziq\API\Request;

use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\Entity\Classroom;

class Modify implements RequestInterface
{
    /** @var Classroom */
    private $classroom;
    
    private $classroomId;

    public function __construct($classroomId, Classroom $classroom)
    {
        $this->classroom = $classroom;
        $this->classroomId = $classroomId;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'modify';
    }

    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        return array_merge(['class_id' => $this->classroomId], $this->classroom->toArray());
    }
}
