<?php
namespace mikemix\Wiziq\Common\Service;

use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\ValueObject\Teacher;

interface AddTeacherInterface
{
    /**
     * Add teacher API call.
     *
     * @param Teacher $teacher
     * @return RequestInterface
     */
    public function addTeacher(Teacher $teacher);
}
