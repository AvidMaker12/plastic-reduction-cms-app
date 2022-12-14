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
            'plastic_calculator_multiple_choices' => PlasticCalculatorMultipleChoice::all(),
            'users' => User::all()
        ]);
    }

    public function addForm()
    {
        return view('plastic_calculator_questions.add');
    }
    
    public function add()
    {
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

    public function addChoice(PlasticCalculatorQuestion $plastic_calculator_question) // PlasticCalculatorQuestion $plastic_calculator_question, PlasticCalculatorMultipleChoice $plastic_calculator_multiple_choice
    {
        $attributes = request()->validate([
            'choice' => 'required',
            'choice_category' => 'required',
            'slug' => 'required',
            'icon' => 'nullable',
            'plastic_calculator_question_id' => 'required',
        ]);

        $multiple_choice = new PlasticCalculatorMultipleChoice();
        $multiple_choice->choice = $attributes['choice'];
        $multiple_choice->choice_category = $attributes['choice_category'];
        $multiple_choice->slug = $attributes['slug'];

        if(request()->file('icon')){
            // Storage::delete($plastic_calculator_multiple_choice->icon); // Delete previously stored image, if any.
            $path = request()->file('icon')->store('plastic_calculator_multiple_choices', 'public');
            $multiple_choice->icon = $path;
        }else{
            $multiple_choice->icon = null; // Sets icon to null if no icon uploaded. Gives users option to upload icon later.
        }

        $multiple_choice->plastic_calculator_question_id = $attributes['plastic_calculator_question_id'];
        $multiple_choice->user_id = Auth::user()->id;
        $multiple_choice->save();

        return redirect(route('plastic_calculator_question.list'))
            ->with('message', 'New Multiple Choice has been added to Question '.$attributes['plastic_calculator_question_id'].'.');
    }

    public function editForm(PlasticCalculatorQuestion $plastic_calculator_question)
    {
        return view('plastic_calculator_questions.edit', [
            'plastic_calculator_question' => $plastic_calculator_question,
            'plastic_calculator_multiple_choice' => PlasticCalculatorMultipleChoice::all(),
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
            ->with('message', 'Question '.$plastic_calculator_question->id.' has been edited.');
    }

    public function editChoice(PlasticCalculatorMultipleChoice $multiple_choice, PlasticCalculatorQuestion $plastic_calculator_question) // PlasticCalculatorQuestion $plastic_calculator_question, PlasticCalculatorMultipleChoice $plastic_calculator_multiple_choice
    {
        $attributes = request()->validate([
            'choice' => 'required',
            'choice_category' => 'required',
            'slug' => 'required',
            'icon' => 'nullable',
            'question_id' => 'required',
        ]);

        // $multiple_choice = PlasticCalculatorMultipleChoice::all();
        $multiple_choice->choice = $attributes['choice'];
        $multiple_choice->choice_category = $attributes['choice_category'];
        $multiple_choice->slug = $attributes['slug'];

        if(request()->file('icon') && !$multiple_choice->icon){ // If user is uploading new icon and there is no existing icon in the database.
            $path = request()->file('icon')->store('plastic_calculator_multiple_choices', 'public');
            $multiple_choice->icon = $path;
        }elseif($multiple_choice->icon){ // If icon exits in database and user is not uploading a new icon.
            Storage::delete($multiple_choice->icon); // Delete previously stored image, if any.
            $path = request()->file('icon')->store('plastic_calculator_multiple_choices', 'public');
            $multiple_choice->icon = $path;
        }else{ // If there is no icon in database and user is not uploading a new icon.
            $multiple_choice->icon = null; // Sets icon to null if no icon uploaded. Gives users option to upload icon later.
        }
        // if($plastic_calculator_multiple_choice->icon){
        //     Storage::delete($plastic_calculator_multiple_choice->icon); // Delete previously stored image, if any.
        //     $path = request()->file('icon')->store('plastic_calculator_multiple_choices', 'public');
        //     $plastic_calculator_multiple_choice->icon = $path;
        // }else{
        //     $path = null; // Sets icon to null if no icon uploaded. Gives users option to upload icon later.
        // }

        $multiple_choice->plastic_calculator_question_id = $attributes['question_id'];
        $multiple_choice->user_id = Auth::user()->id;
        $multiple_choice->save();

        return redirect(route('plastic_calculator_question.list'))
            ->with('message', 'Multiple Choice '.$multiple_choice->id.' for Question '.$attributes['question_id'].' has been edited.');
    }

    public function delete(PlasticCalculatorQuestion $plastic_calculator_question)
    {        
        $plastic_calculator_question->delete();

        return redirect(route('plastic_calculator_question.list'))
            ->with('message', 'Plastic Calculator Question has been deleted.');            
    }

    public function deleteChoice(PlasticCalculatorMultipleChoice $multiple_choice, PlasticCalculatorQuestion $plastic_calculator_question)
    {        
        $multiple_choice->delete();

        return redirect(route('plastic_calculator_question.list'))
            ->with('message', 'Multiple Choice '.$multiple_choice->id.' for Question '.$multiple_choice->plastic_calculator_question_id.' has been deleted.');            
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
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
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

    public function iconChoice(PlasticCalculatorQuestion $plastic_calculator_question, PlasticCalculatorMultipleChoice $multiple_choice)
    {
        $attributes = request()->validate([
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'question_id' => 'required',
        ]);

        if($multiple_choice->icon){
            Storage::delete($multiple_choice->icon); // Delete previously stored image, if any.
        }

        $path = request()->file('icon')->store('plastic_calculator_multiple_choices', 'public'); // Expected string output example: users/picture.jpg
        $multiple_choice->icon = $path; // Expected string output example to be stored into DB: http://127.0.0.1:8000/storage/plastic_calculator_questions/picture.jpg
        
        $multiple_choice->plastic_calculator_question_id = $attributes['question_id'];
        $multiple_choice->user_id = Auth::user()->id;
        $multiple_choice->save();
        
        return redirect(route('plastic_calculator_question.list'))
            ->with('message', 'Multiple Choice '.$multiple_choice->id.' icon for Question '.$attributes['question_id'].' has been saved.');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
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
