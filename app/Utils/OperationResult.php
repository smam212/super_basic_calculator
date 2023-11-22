<?php

namespace App\Utils;

final class OperationResult
{
    private ?string $errorMessage = NULL;
    private ?float $result = NULL;

    public function getErrorMessage(): string | null
    {
        return $this->errorMessage;
    }

    public function getResult():float | null
    {
        return $this->result;
    }

    public function setErrorMessage(string $errorMessage): void
    {
        $this->errorMessage = $errorMessage;
    }

    public function setResult(string $result): void
    {
        $this->result = $result;
    }
}
