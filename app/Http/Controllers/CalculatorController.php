<?php

namespace App\Http\Controllers;

use App\Services\CalculateService\Contracts\ICalculateService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CalculatorController extends Controller
{
    public function __construct(protected ICalculateService $calculator) {}

    public function calculate():RedirectResponse
    {
        $num1 = request()->input('num1');
        $num2 = request()->input('num2');
        [$result, $error] = $this->calculator->calculateFromOperationString(
            $num1, $num2, request()->input('operation')
        );
        return redirect()->back()->with(
            [
                'result' => $result,
                'error' => $error,
                'num1' => $num1,
                'num2' => $num2,
            ]
        );
    }

    public function index(): View
    {
        return view('calculator');
    }
}
