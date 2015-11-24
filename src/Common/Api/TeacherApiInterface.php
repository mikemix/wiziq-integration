<?php
namespace mikemix\Wiziq\Common\Api;

use mikemix\Wiziq\Entity\Teacher;

interface TeacherApiInterface
{
    /**
     * Add the teacher.
     *
     * @see http://developer.wiziq.com/teacher/method/add_teacher
     *
     * @param Teacher $teacher Teacher data
     *
     * @return int Teacher's internal wiziq ID
     *
     * @throws Exception\CallException
     */
    public function addTeacher(Teacher $teacher);

    /**
     * Edit the teacher.
     *
     * @see http://developer.wiziq.com/teacher/method/edit_teacher
     *
     * @param int     $teacherId   Wiziq's teacher ID
     * @param Teacher $teacher     New teacher's data
     *
     * @return void
     *
     * @throws Exception\CallException
     */
    public function editTeacher($teacherId, Teacher $teacher);

    /**
     * Get teacher details.
     *
     * @see http://developer.wiziq.com/teacher/method/get_teacher_details
     *
     * @param int $teacherId Wiziq's teacher ID
     *
     * @return array         Teacher's details
     *
     * @throws Exception\CallException
     */
    public function getTeacherDetails($teacherId);
}
