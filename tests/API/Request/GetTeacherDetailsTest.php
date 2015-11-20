<?php
namespace mikemix\Wiziq\Tests\Service;

use mikemix\Wiziq\API\Request\GetTeacherDetails;

class GetTeacherDetailsTest extends \PHPUnit_Framework_TestCase
{
    /** @var GetTeacherDetails */
    private $request;

    public function setUp()
    {
        $this->request = new GetTeacherDetails(12345);
    }

    public function testGetMethodSet()
    {
        $this->assertEquals('get_teacher_details', $this->request->getMethod());
    }

    public function testGetParams()
    {
        $this->assertEquals(['teacher_id' => 12345], $this->request->getParams());
    }
}
