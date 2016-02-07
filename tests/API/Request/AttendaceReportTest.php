<?php
namespace mikemix\Wiziq\Tests\API\Request;

use mikemix\Wiziq\API\Request\AttendanceReport;
use mikemix\Wiziq\Entity\Teacher;

class AttendanceReportTest extends \PHPUnit_Framework_TestCase
{
   
    /** @var AttendanceReport */
    private $request;

    public function setUp()
    {
        $this->request = new AttendanceReport(12345);
    }

    public function testGetMethod()
    {
        $this->assertEquals('get_attendance_report', $this->request->getMethod());
    }

    public function testGetParams()
    {
        $params = [
            'class_id'         => 12345
        ];

        $this->assertEquals($params, $this->request->getParams());
    }
}
