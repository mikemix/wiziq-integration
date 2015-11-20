<?php
namespace mikemix\Wiziq\Common\Api;

use mikemix\Wiziq\Entity\Teacher;

interface WiziqSdkInterface
{
    /**
     * Add the teacher.
     *
     * @param Teacher $teacher
     * @return int Teacher's internal wiziq ID
     *
     * @throws Exception\CallException
     */
    public function addTeacher(Teacher $teacher);

    /**
     * Edit teacher $teacherId
     *
     * @param int $teacherId   Wiziq's teacher ID
     * @param Teacher $teacher New teacher's data
     * @return void
     *
     * @throws Exception\CallException
     */
    public function editTeacher($teacherId, Teacher $teacher);

    /**
     * Get $teacherId details
     *
     * @param int $teacherId Wiziq's teacher ID
     * @return array         Teacher's details
     *
     * @throws Exception\CallException
     */
    public function getTeacherDetails($teacherId);
}
