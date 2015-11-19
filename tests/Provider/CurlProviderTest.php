<?php
namespace mikemix\Wiziq\Tests\Provider;

use mikemix\Wiziq\Common\Provider\Exception\InvalidResponseException;
use mikemix\Wiziq\Provider\CurlProvider;

class CurlProviderTest extends \PHPUnit_Framework_TestCase
{
    /** @var CurlProvider */
    private $provider;

    public function setUp()
    {
        $this->provider = new CurlProvider();
    }

    public function testValidResponseReturnsResponse()
    {
        $testFile = __DIR__ . '/../resources/curlfile.txt';

        $this->assertEquals(
            file_get_contents($testFile),
            $this->provider->getResponse($this->convertPathToUri($testFile), [])
        );
    }

    public function testInvalidResponseThrowsException()
    {
        $this->setExpectedException(InvalidResponseException::class);
        $this->provider->getResponse('', []);
    }

    private function convertPathToUri($path)
    {
        $uri = 'file://' . str_replace(':', '', $path);
        $uri = str_replace('\\', '/', $uri);

        return $uri;
    }
}
