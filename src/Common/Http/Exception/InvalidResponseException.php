<?php
namespace mikemix\Wiziq\Common\Http\Exception;

class InvalidResponseException extends \RuntimeException
{
    public static function with($url, $errorMessage)
    {
        return new self(sprintf('Invalid response from %s: %s', $url, $errorMessage));
    }
}
