<?php
namespace mikemix\Wiziq\API\Request;

use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\Entity\Teacher;

class EditTeacher implements RequestInterface
{
    /** @var int */
    private $teacherId;

    /** @var Teacher */
    private $teacher;

    public function __construct($teacherId, Teacher $teacher)
    {
        $this->teacherId = (int)$teacherId;
        $this->teacher   = $teacher;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'edit_teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        return array_merge(['teacher_id' => $this->teacherId], $this->teacher->toArray());
    }
}
