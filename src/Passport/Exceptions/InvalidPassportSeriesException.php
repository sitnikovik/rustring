<?php

namespace Sitnikovik\RussianStrings\Exceptions;

use Exception;

class InvalidPassportSeriesException extends Exception
{
    public function __construct($message = "", $code = 400, Throwable $previous = null)
    {
        parent::__construct("Некорректная серия паспорта: " . $message, $code, $previous);
    }
}