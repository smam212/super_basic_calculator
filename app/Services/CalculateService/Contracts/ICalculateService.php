<?php

namespace App\Services\CalculateService\Contracts;

use App\Enums\Operation;

interface ICalculateService
{
    function calculate(
        float $num1,
        float $num2,
        Operation $operation
    ):array;

    // allowed $operation values 'division', 'subtraction', 'addition', 'multiplication'
    function calculateFromOperationString(
        float $num1,
        float $num2,
        string $operation
    ):array;
}
