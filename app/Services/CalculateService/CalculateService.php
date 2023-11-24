<?php

namespace App\Services\CalculateService;

use App\Enums\Operation;
use App\Services\CalculateService\Contracts\ICalculateService;
use App\Utils\OperationHelper;

class CalculateService implements ICalculateService
{

    public function calculate(float $num1, float $num2, Operation $operation): array
    {
        return $this->execute($num1,$num2,$operation);
    }

    public function calculateFromOperationString(float $num1, float $num2, string $operation): array
    {
        try {
            $operation = OperationHelper::convertStringToOperation($operation);
            return $this->execute($num1,$num2,$operation);
        } catch (\Exception $e){
            return CalculateService::makeResultArray(null,$e->getMessage());
        }
    }

    private function execute(float $num1, float $num2, Operation $operation): array
    {
        $helper = OperationHelper::make($num1,$num2)
            ->withOperator($operation);
        $helper->setOperation()->execute();
        return CalculateService::makeResultArray(
            $helper->getResult(),
            $helper->getErrorMessage());
    }

    private static function makeResultArray(?float $result, ?string $errorMessage): array
    {
        return [$result, $errorMessage];
    }
}
