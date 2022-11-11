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

class PlasticCalculatorMultipleChoiceController extends Controller
{
    public function list()
    {
        return view('plastic_calculator_multiple_choices.list', [
            'plastic_calculator_multiple_choices' => PlasticCalculatorMultipleChoice::all(),
            'plastic_calculator_questions' => PlasticCalculatorQuestion::all(),
            'users' => User::all()
        ]);
    }

    public function addForm()
    {
        return view('plastic_calculator_multiple_choices.add');
    }
    
    public function add()
    {
        $attributes = request()->validate([
            'plastic_calculator_question_id' => 'required',
            'choice' => 'required',
            'choice_category' => 'required',
            'slug' => 'required|unique:plastic_calculator_multiple_choices|regex:/^[A-z\-]+$/',
            'user_id' => 'required',
        ]);

        $plastic_calculator_multiple_choice = new PlasticCalculatorMultipleChoice();
        $plastic_calculator_multiple_choice->plastic_calculator_question_id = $attributes['plastic_calculator_question_id'];
        $plastic_calculator_multiple_choice->choice = $attributes['choice'];
        $plastic_calculator_multiple_choice->choice_category = $attributes['choice_category'];
        $plastic_calculator_multiple_choice->slug = $attributes['slug'];
        $plastic_calculator_multiple_choice->user_id = Auth::user()->id;
        $plastic_calculator_multiple_choice->save();

        return redirect(route('plastic_calculator_multiple_choice.list'))
            ->with('message', 'New Plastic Calculator Multiple Choice has been added.');
    }

    public function editForm(PlasticCalculatorMultipleChoice $plastic_calculator_multiple_choice)
    {
        return view('plastic_calculator_multiple_choices.edit', [
            'plastic_calculator_multiple_choice' => $plastic_calculator_multiple_choice,
        ]);
    }

    public function edit(PlasticCalculatorMultipleChoice $plastic_calculator_multiple_choice)
    {
        $attributes = request()->validate([
            'plastic_calculator_question_id' => 'required',
            'choice' => 'required',
            'choice_category' => 'required',
            'slug' => 'required|unique:plastic_calculator_multiple_choices|regex:/^[A-z\-]+$/',
            'user_id' => 'required',
        ]);

        $plastic_calculator_question->plastic_calculator_question_id = $attributes['plastic_calculator_question_id'];
        $plastic_calculator_multiple_choice->choice = $attributes['choice'];
        $plastic_calculator_multiple_choice->choice_category = $attributes['choice_category'];
        $plastic_calculator_multiple_choice->slug = $attributes['slug'];
        $plastic_calculator_question->user_id = Auth::user()->id;
        $plastic_calculator_question->save();

        return redirect(route('plastic_calculator_multiple_choice.list'))
            ->with('message', 'Plastic Calculator Multiple Choice has been edited.');
    }

    public function delete(PlasticCalculatorMultipleChoice $plastic_calculator_multiple_choice)
    {        
        $plastic_calculator_multiple_choice->delete();

        return redirect(route('plastic_calculator_multiple_choice.list'))
            ->with('message', 'Plastic Calculator Multiple Choice has been deleted.');            
    }

    public function iconForm(PlasticCalculatorMultipleChoice $plastic_calculator_multiple_choice)
    {
        return view('plastic_calculator_multiple_choices.icon', [
            'plastic_calculator_multiple_choice' => $plastic_calculator_multiple_choice,
        ]);
    }

    public function icon(PlasticCalculatorMultipleChoice $plastic_calculator_multiple_choice)
    {
        $attributes = request()->validate([
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($plastic_calculator_multiple_choice->icon){
            Storage::delete($plastic_calculator_multiple_choice->icon); // Delete previously stored image, if any.
        }

        $path = request()->file('icon')->store('plastic_calculator_multiple_choices', 'public'); // Expected string output example: users/picture.jpg
        $plastic_calculator_multiple_choice->icon = $path; // Expected string output example to be stored into DB: http://127.0.0.1:8000/storage/plastic_calculator_multiple_choices/picture.jpg
        $plastic_calculator_multiple_choice->save();
        
        return redirect(route('plastic_calculator_question.list'))
            ->with('message', 'Plastic Calculator Question icon has been saved.');
    }
}
