<?php

namespace App\Http\Controllers;

use App\Models\PlasticProduct;
use App\Models\PlasticCalculatorQuestion;
use App\Models\PlasticCalculatorMultipleChoice;
use Illuminate\Http\Request;

class QuickCalculatorController extends Controller
{
    public function quickQuestion1(PlasticCalculatorQuestion $quick_questions) // Pass in 'quick_questions' id via 'quick_questions' variable.
    {
        return view('quick_calculator.page1', [
            'quick_questions' => $quick_questions,
            'quick_choices' => PlasticCalculatorMultipleChoice::all(),
            'segmentURL' => \Request::segment(2)
        ]);
    }

    public function quickQuestion2()
    {
        return view('quick_calculator.page2', [
            'quick_questions' => PlasticCalculatorQuestion::all(),
            'quick_choices' => PlasticCalculatorMultipleChoice::all(),
            'plastic_products' => PlasticProduct::all(),
            'segmentURL' => \Request::segment(3)
        ]);
    }

    public function currentURL(Request $request)
    {         
        $currentURL = $request->fullUrl(); // Show full current URL with parameters.
    }

    public function quickResult(PlasticCalculatorMultipleChoice $quick_choices)
    {
        return view('quick_calculator.result', [
            'quick_questions' => PlasticCalculatorQuestion::all(),
            'quick_choices' => $quick_choices,
            'plastic_products' => PlasticProduct::all(),
            'segmentURL' => \Request::segment(3)
        ]);
    }
}
