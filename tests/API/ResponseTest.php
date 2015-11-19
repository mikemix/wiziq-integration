<?php
namespace mikemix\Wiziq\Tests\API;

use mikemix\Wiziq\API\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    /** @var \SimpleXMLElement */
    private $failedResponse;

    public function setUp()
    {
        $this->failedResponse = simplexml_load_string('<rsp status="fail"><error code="403" msg="Forbidden: The request is refused by the API."/></rsp>');
    }

    public function testFailedResponse()
    {
        $response = new Response($this->failedResponse);

        $this->assertFalse($response->isSuccess());
        $this->assertSame(403, $response->getErrorCode());
        $this->assertSame("Forbidden: The request is refused by the API.", $response->getErrorMessage());
    }
}
