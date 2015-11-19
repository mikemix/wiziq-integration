<?php
namespace mikemix\Wiziq\API\Request;

use mikemix\Wiziq\Entity\Teacher;

class EditTeacher extends AddTeacher
{
    /** @var int */
    private $teacherId;

    public function __construct($teacherId, Teacher $teacher)
    {
        $this->teacherId = (int)$teacherId;
        parent::__construct($teacher);
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
        return array_merge(['teacher_id' => $this->teacherId], parent::getParams());
    }
}
