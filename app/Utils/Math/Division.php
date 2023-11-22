<?php

namespace App\Utils\Math;

use App\Utils\BaseOperation;

class Division extends BaseOperation implements \App\Contracts\IOperation
{
    public function __construct(float $num1,float $num2){
        parent::__construct($num1, $num2);
    }

    public function execute(): float
    {
        return $this->num1 / $this->num2;
    }
}
