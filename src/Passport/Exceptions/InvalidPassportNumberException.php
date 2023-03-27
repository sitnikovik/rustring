<?php

namespace Sitnikovik\RussianStrings\Exceptions;

use Exception;
use Throwable;

class InvalidPassportNumberException extends Exception
{
    public function __construct($message = "", $code = 400, Throwable $previous = null)
    {
        parent::__construct("Некорректный номер паспорта: " . $message, $code, $previous);
    }
}