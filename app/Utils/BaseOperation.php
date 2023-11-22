<?php

namespace App\Utils;

abstract class BaseOperation
{
    public function __construct(protected float $num1, protected float $num2)
    {
    }
}
