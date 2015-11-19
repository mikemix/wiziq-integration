<?php
namespace mikemix\Wiziq\Tests\Http;

use mikemix\Wiziq\API\Response;
use mikemix\Wiziq\Common\Http\Exception\InvalidResponseException;
use mikemix\Wiziq\Http\CurlClient;

class CurlClientTest extends \PHPUnit_Framework_TestCase
{
    /** @var CurlClient */
    private $client;

    public function setUp()
    {
        $this->client = new CurlClient();
    }

    public function testValidResponseReturnsResponse()
    {
        $testFile = __DIR__ . '/../.resources/curlfile.txt';

        $this->assertInstanceOf(Response::class, $this->client->getResponse($this->convertPathToUri($testFile), []));
    }

    public function testInvalidResponseThrowsException()
    {
        $this->setExpectedException(InvalidResponseException::class);
        $this->client->getResponse('', []);
    }

    private function convertPathToUri($path)
    {
        $uri = 'file://' . str_replace(':', '', $path);
        $uri = str_replace('\\', '/', $uri);

        return $uri;
    }
}
