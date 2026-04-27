<?php
namespace LouisLun\LaravelZingala\Exceptions;

use Throwable;

class ZingalaException extends \Exception
{
    protected $apiResponse;

    public function __construct($message, $code = 0, \Throwable $previous = null, $apiResponse = [])
    {
        $this->apiResponse = $apiResponse;
        parent::__construct($message, $code, $previous);
    }

    public function getApiResponse()
    {
        return $this->apiResponse;
    }
}
