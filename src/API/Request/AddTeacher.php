<?php
namespace mikemix\Wiziq\API\Request;

use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\Entity\Teacher;

class AddTeacher implements RequestInterface
{
    /** @var Teacher */
    private $teacher;

    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'add_teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        return array_filter($this->teacher->toArray());
    }
}
