<?php
namespace mikemix\Wiziq\API\Request;

use mikemix\Wiziq\Common\Api\RequestInterface;

class Cancel implements RequestInterface
{
    /** @var int */
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
        return 'cancel';
    }

    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        return [
            'classroom_id'  => $this->classroomId,
        ];
    }
}
