<?php
namespace mikemix\Wiziq\Common\Api;

use mikemix\Wiziq\API\Response;
use mikemix\Wiziq\Entity\Teacher;

interface WiziqSdkInterface
{
    /**
     * Add the teacher.
     *
     * @param Teacher $teacher
     * @return Response
     */
    public function addTeacher(Teacher $teacher);
}
