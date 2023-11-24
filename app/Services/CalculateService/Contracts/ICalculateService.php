<?php

namespace App\Services\CalculateService\Contracts;

use App\Enums\Operation;

interface ICalculateService
{
    public function calculate(
        float $num1,
        float $num2,
        Operation $operation
    ):array;

    // allowed $operation values 'division', 'subtraction', 'addition', 'multiplication'
    public function calculateFromOperationString(
        float $num1,
        float $num2,
        string $operation
    ):array;
}
