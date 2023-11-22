<?php

namespace App\Http\Controllers;

use App\Utils\OperationHelper;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CalculatorController extends Controller
{
    public function calculate():RedirectResponse
    {
        $num1 =request()->input('num1');
        $num2 =request()->input('num2');
        $helper = OperationHelper::make($num1,$num2)
            ->withOperator(request()->input('operation'));
        $helper->setOperation()->execute();
        session(['num1'=>$num1, 'num2'=>$num2]);
        return redirect()->back()->with(
            'error' , $helper->getErrorMessage(),)
            ->with(
            'result' , $helper->getResult(),);
    }

    public function index(): View
    {
        return view('calculator');
    }
}
