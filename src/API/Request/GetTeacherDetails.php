<?php
namespace mikemix\Wiziq\API\Request;

use mikemix\Wiziq\Common\Api\RequestInterface;

class GetTeacherDetails implements RequestInterface
{
    /** @var int */
    private $teacherId;

    public function __construct($teacherId)
    {
        $this->teacherId = (int)$teacherId;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'get_teacher_details';
    }

    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        return ['teacher_id' => $this->teacherId];
    }
}
