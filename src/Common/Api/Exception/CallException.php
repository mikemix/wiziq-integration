<?php
namespace mikemix\Wiziq\Common\Api\Exception;

use mikemix\Wiziq\API\Response;

class CallException extends \RuntimeException
{
    public static function from(Response $response)
    {
        return new self($response->getErrorMessage(), $response->getErrorCode());
    }
}
