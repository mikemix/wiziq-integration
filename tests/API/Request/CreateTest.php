<?php
namespace mikemix\Wiziq\Tests\API\Request;

use mikemix\Wiziq\API\Request\Create;
use mikemix\Wiziq\Entity\Classroom;

class CreateTest extends \PHPUnit_Framework_TestCase
{
    /** @var Classroom */
    private $classroom;

    /** @var Create */
    private $request;

    public function setUp()
    {
        $this->classroom = Classroom::build('Title', new \DateTime('2015-12-30 12:30:40'), 'test@mike.com');
        $this->request   = new Create($this->classroom);
    }

    public function testGetMethod()
    {
        $this->assertEquals('create', $this->request->getMethod());
    }

    public function testGetParams()
    {
        $params = [
            'title'           => 'Title',
            'start_time'      => '30/12/2015 12:30:40',
            'presenter_email' => 'test@mike.com',
        ];

        $this->assertEquals($params, $this->request->getParams());
    }
}
