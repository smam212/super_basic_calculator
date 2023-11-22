<?php

namespace App\Utils;

use App\Contracts\IOperation;
use App\Utils\Math\Addition;
use App\Utils\Math\Division;
use App\Utils\Math\Multiplication;
use App\Utils\Math\Subtraction;

class OperationHelper
{
    private string $operator;
    private IOperation $operation;
    private OperationResult $operationResult;
    public function __construct(
        private float $num1,
        private float $num2,
    ){
        $this->operationResult = new OperationResult();
    }

    public static function make(float $num1, float $num2): OperationHelper
    {
        return new OperationHelper($num1, $num2);
    }

    public function withOperator(string $operator): OperationHelper
    {
        $this->operator = $operator;
        return $this;
    }

    public function setOperation(): OperationHelper
    {
        try
        {
            $this->operation = match ($this->operator){
                'add'=> new Addition($this->num1, $this->num2),
                'multiply'=> new Multiplication($this->num1, $this->num2),
                'subtract'=> new Subtraction($this->num1, $this->num2),
                'divide'=> new Division($this->num1, $this->num2),
            };
        } catch (\Throwable $e){
            $this->operationResult->setErrorMessage($e->getMessage());
        }
        return $this;
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
