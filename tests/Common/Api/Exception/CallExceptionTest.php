<?php
namespace mikemix\Wiziq\Tests\Common\Api\Exception;

use mikemix\Wiziq\API\Response;
use mikemix\Wiziq\Common\Api\Exception\CallException;

class CallExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateFromResponse()
    {
        $errorMessage = 'Error';
        $errorCode    = 100;

        $response = $this->getMockBuilder(Response::class)
            ->setMethods(['getErrorMessage', 'getErrorCode'])
            ->disableOriginalConstructor()
            ->getMock();

        $response->expects($this->once())->method('getErrorMessage')->will($this->returnValue($errorMessage));
        $response->expects($this->once())->method('getErrorCode')->will($this->returnValue($errorCode));

        $exception = CallException::from($response);

        $this->assertEquals($errorMessage, $exception->getMessage());
        $this->assertEquals($errorCode, $exception->getCode());
    }
}
