<?php

namespace App\Http\Controllers;

use App\Models\PlasticProduct;
use App\Models\PlasticCalculatorQuestion;
use App\Models\PlasticCalculatorMultipleChoice;
use App\Models\Score;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function Question1(PlasticCalculatorQuestion $quick_questions) // Pass in 'quick_questions' id via 'quick_questions' variable.
    {
        return view('questionnaire.page1', [
            'quick_questions' => $quick_questions,
            'quick_choices' => PlasticCalculatorMultipleChoice::all(),
            'segmentURL' => \Request::segment(2)
        ]);
    }

    public function Question2()
    {
        return view('questionnaire.page2', [
            'quick_questions' => PlasticCalculatorQuestion::all(),
            'quick_choices' => PlasticCalculatorMultipleChoice::all(),
            'plastic_products' => PlasticProduct::all(),
            'scores' => Score::all(),
            'segmentURL' => \Request::segment(3)
        ]);
    }

    public function Result(PlasticCalculatorMultipleChoice $quick_choices)
    {
        return view('questionnaire.result', [
            'quick_questions' => PlasticCalculatorQuestion::all(),
            'quick_choices' => $quick_choices,
            'plastic_products' => PlasticProduct::all(),
            'scores' => Score::all(),
            'segmentURL' => \Request::segment(3)
        ]);
    }
}
