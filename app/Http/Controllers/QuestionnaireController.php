<?php

namespace App\Http\Controllers;

use App\Models\PlasticProduct;
use App\Models\PlasticCalculatorQuestion;
use App\Models\PlasticCalculatorMultipleChoice;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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

    public function ResultProcess(PlasticCalculatorMultipleChoice $quick_choices)
    {
        $attributes = request()->validate([
            'score' => 'required',
            'score_percent' => 'required',
            'score_category' => 'required',
        ]);
        
        $scores = new Score();
        $scores->score = $attributes['score'];
        $scores->score_percent = $attributes['score_percent'];
        $scores->score_category = $attributes['score_category'];
        $scores->user_id = Auth::user()->id;
        $scores->save();

        return redirect(route('questionnaire.result', [
            'quick_questions' => PlasticCalculatorQuestion::all(),
            'quick_choices' => $quick_choices,
            'plastic_products' => PlasticProduct::all(),
            'scores' => Score::all(),
            'segmentURL' => \Request::segment(3)
        ]));
    }

    public function Result(PlasticCalculatorMultipleChoice $quick_choices)
    {
        return view('questionnaire.result', [
            'quick_questions' => PlasticCalculatorQuestion::all(),
            'quick_choices' => $quick_choices,
            'plastic_products' => PlasticProduct::all(),
            'scores' => Score::all(),
            'segmentURL' => \Request::segment(3)
        ])
            ->with('message', 'Your score has been saved.');
    }

}
