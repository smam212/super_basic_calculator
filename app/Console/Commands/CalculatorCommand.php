<?php

namespace App\Console\Commands;

use App\Services\CalculateService\Contracts\ICalculateService;
use Illuminate\Console\Command;

class CalculatorCommand extends Command
{
    public function __construct(protected ICalculateService $calculator){
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculator:calculate {operation} {num1} {num2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Simple calculator';

    protected $help = 'allowed operations: division subtraction multiplication addition';
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $num1 = $this->argument('num1');
        $num2 = $this->argument('num2');
        $operation = $this->argument('operation');
        [$result, $error] = $this->calculator->calculateFromOperationString(
            $num1,$num2, $operation
        );
        if ($error){
            $this->error($error);
            return Command::FAILURE;
        }
        echo 'Result: '.$result;
        return Command::SUCCESS;
    }
}
