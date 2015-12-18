<?php
namespace mikemix\Wiziq\Tests\API\Request;

use mikemix\Wiziq\API\Request\AddAttendees;
use mikemix\Wiziq\API\Request\Cancel;

class CancelTest extends \PHPUnit_Framework_TestCase
{
    /** @var AddAttendees */
    private $request;

    public function setUp()
    {
        $this->request = new Cancel(12345);
    }

    public function testGetMethod()
    {
        $this->assertEquals('cancel', $this->request->getMethod());
    }

    public function testGetParams()
    {
        $params = [
            'class'  => 12345,
        ];

        $this->assertEquals($params, $this->request->getParams());
    }
}
