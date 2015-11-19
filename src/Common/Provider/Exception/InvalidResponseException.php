<?php
namespace mikemix\Wiziq\Common\Provider\Exception;

class InvalidResponseException extends \RuntimeException
{
    public static function with($url, $errorMessage)
    {
        return new self(sprintf('Could not get data from %s: %s', $url, $errorMessage));
    }
}
