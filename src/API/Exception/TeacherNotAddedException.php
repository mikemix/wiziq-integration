<?php
namespace mikemix\Wiziq\API\Exception;

use mikemix\Wiziq\API\Response;

class TeacherNotAddedException extends \RuntimeException
{
    public static function with(Response $response)
    {
        return new self(sprintf('Teacher not added. %d: %s', $response->getErrorCode(), $response->getErrorMessage()));
    }
}
