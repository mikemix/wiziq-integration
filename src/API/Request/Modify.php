<?php
namespace mikemix\Wiziq\API\Request;

use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\Entity\Classroom;

class Modify implements RequestInterface
{
    /** @var int */
    private $classroomId;

    /** @var Classroom */
    private $classroom;

    public function __construct($classroomId, Classroom $classroom)
    {
        $this->classroomId = (int)$classroomId;
        $this->classroom   = $classroom;
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
