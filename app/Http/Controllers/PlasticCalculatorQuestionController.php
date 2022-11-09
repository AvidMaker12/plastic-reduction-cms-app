<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PlasticProduct;
use App\Models\PlasticCalculatorQuestion;
use App\Models\PlasticCalculatorMultipleChoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PlasticCalculatorQuestionController extends Controller
{
    public function list()
    {             
        return view('plastic_calculator_questions.list', [
            'plastic_calculator_questions' => PlasticCalculatorQuestion::all(),
            'users' => User::all()
        ]);
    }

    public function addForm()
    {
        return view('plastic_calculator_questions.add');
    }
    
    public function add()
    {
        // dd(request());

        $attributes = request()->validate([
            'question' => 'required',
        ]);

        $plastic_calculator_question = new PlasticCalculatorQuestion();
        $plastic_calculator_question->question = $attributes['question'];
        $plastic_calculator_question->user_id = Auth::user()->id;
        $plastic_calculator_question->save();

        return redirect(route('plastic_calculator_question.list'))
            ->with('message', 'New Plastic Calculator Question has been added.');
    }

    public function editForm(PlasticCalculatorQuestion $plastic_calculator_question)
    {
        return view('plastic_calculator_questions.edit', [
            'plastic_calculator_question' => $plastic_calculator_question,
        ]);
    }

    public function edit(PlasticCalculatorQuestion $plastic_calculator_question)
    {
        $attributes = request()->validate([
            'question' => 'required',
        ]);

        $plastic_calculator_question->question = $attributes['question'];
        $plastic_calculator_question->user_id = Auth::user()->id;
        $plastic_calculator_question->save();

        return redirect(route('plastic_calculator_question.list'))
            ->with('message', 'Plastic Calculator Question has been edited.');
    }

    public function delete(PlasticCalculatorQuestion $plastic_calculator_question)
    {        
        $plastic_calculator_question->delete();

        return redirect(route('plastic_calculator_question.list'))
            ->with('message', 'Plastic Calculator Question has been deleted.');            
    }

    public function iconForm(PlasticCalculatorQuestion $plastic_calculator_question)
    {
        return view('plastic_calculator_questions.icon', [
            'plastic_calculator_question' => $plastic_calculator_question,
        ]);
    }

    public function icon(PlasticCalculatorQuestion $plastic_calculator_question)
    {
        $attributes = request()->validate([
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($plastic_calculator_question->icon){
            Storage::delete($plastic_calculator_question->icon); // Delete previously stored image, if any.
        }

        $path = request()->file('icon')->store('plastic_calculator_questions', 'public'); // Expected string output example: users/picture.jpg
        $plastic_calculator_question->icon = $path; // Expected string output example to be stored into DB: http://127.0.0.1:8000/storage/plastic_calculator_questions/picture.jpg
        $plastic_calculator_question->save();
        
        return redirect(route('plastic_calculator_question.list'))
            ->with('message', 'Plastic Calculator Question icon has been saved.');
    }

    public function imageForm(PlasticCalculatorQuestion $plastic_calculator_question)
    {
        return view('plastic_calculator_questions.image', [
            'plastic_calculator_question' => $plastic_calculator_question,
        ]);
    }

    public function image(PlasticCalculatorQuestion $plastic_calculator_question)
    {
        $attributes = request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($plastic_calculator_question->image){
            Storage::delete($plastic_calculator_question->image); // Delete previously stored image, if any.
        }

        $path = request()->file('image')->store('plastic_calculator_questions', 'public'); // Expected string output example: users/picture.jpg
        $plastic_calculator_question->image = $path; // Expected string output example to be stored into DB: http://127.0.0.1:8000/storage/plastic_calculator_questions/picture.jpg
        $plastic_calculator_question->save();
        
        return redirect(route('plastic_calculator_question.list'))
            ->with('message', 'Plastic Calculator Question image has been saved.');
    }
}
