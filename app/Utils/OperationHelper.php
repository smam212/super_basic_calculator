<?php

namespace App\Utils;

use App\Contracts\IOperation;
use App\Enums\Operation;
use App\Services\CalculateService\Exceptions\InvalidOperationException;
use App\Utils\Math\Addition;
use App\Utils\Math\Division;
use App\Utils\Math\Multiplication;
use App\Utils\Math\Subtraction;

class OperationHelper
{
    private Operation $operator;
    private IOperation $operation;
    private OperationResult $operationResult;

    public function __construct(
        private readonly float $num1,
        private readonly float $num2,
    ){
        $this->operationResult = new OperationResult();
    }

    public static function make(float $num1, float $num2): OperationHelper
    {
        return new OperationHelper($num1, $num2);
    }

    public function withOperator(Operation $operator): OperationHelper
    {
        $this->operator = $operator;
        return $this;
    }

    public function setOperation(): OperationHelper
    {
        try
        {
            $this->operation = match ($this->operator){
                Operation::addition => new Addition($this->num1, $this->num2),
                Operation::multiplication => new Multiplication($this->num1, $this->num2),
                Operation::subtraction => new Subtraction($this->num1, $this->num2),
                Operation::division => new Division($this->num1, $this->num2),
            };
        } catch (\Throwable $e){
            $this->operationResult->setErrorMessage($e->getMessage());
        }
        return $this;
    }

    /**
     * @throws InvalidOperationException
     */
    public static function convertStringToOperation(string $operationString): Operation
    {
        return match ($operationString){
            Operation::addition->value => Operation::addition,
            Operation::multiplication->value => Operation::multiplication,
            Operation::division->value => Operation::division,
            Operation::subtraction->value => Operation::subtraction,
            default => throw new InvalidOperationException(),
        };
    }

    public function getErrorMessage(): string | null
    {
        return $this->operationResult->getErrorMessage();
    }

    public function getResult(): float | null
    {
        return $this->operationResult->getResult();
    }

    public function execute():void
    {
        try {
            $this->operationResult->setResult($this->operation->execute());
        } catch (\Throwable $e) {
            $this->operationResult->setErrorMessage($e->getMessage());
        }
    }
}
