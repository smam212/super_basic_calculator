<?php

namespace App\Services\CalculateService\Exceptions;

class InvalidOperationException extends \InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct("The Operation Is Invalid");
    }
}
