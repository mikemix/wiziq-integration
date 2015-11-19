<?php
namespace mikemix\Wiziq\Common\Api;

use mikemix\Wiziq\API\Exception;
use mikemix\Wiziq\Entity\Teacher;

interface WiziqSdkInterface
{
    /**
     * Add the teacher.
     *
     * @param Teacher $teacher
     * @return int Teacher's internal wiziq ID
     *
     * @throws Exception\TeacherNotAddedException
     */
    public function addTeacher(Teacher $teacher);
}
