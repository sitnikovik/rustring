<?php

namespace Sitnikovik\RussianStrings\Exceptions;

use Exception;
use Throwable;

class InvalidPassportIssuerException extends Exception
{
    public function __construct($message = "", $code = 400, Throwable $previous = null)
    {
        parent::__construct("Некорректное подразделение, выдавшее паспорт: " . $message, $code, $previous);
    }
}