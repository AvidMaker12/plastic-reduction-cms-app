<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PlasticProduct;
use App\Models\PlasticCalculatorQuestion;
use App\Models\PlasticCalculatorMultipleChoice;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ClientAccountController extends Controller
{
    public function list()
    {      
        return view('client_user_account.list', [
            'users' => User::all()
        ]); 
    }

    public function edit(User $user)
    {
        $attributes = request()->validate([
            'username' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable',
        ]);

        $user->username = $attributes['username'];
        $user->email = $attributes['email'];
        if($attributes['password']) $user->password = Hash::make($attributes['password']); // Password validation to prevent empty string.
        $user->save();

        $message = 'Profile changes have been saved.';
        return redirect(route('client_user_account.list'))
            ->with('message', $message);
    }

    public function delete(User $user)
    {       
        $user->delete();

        $message = 'User &#39;'.$user->username.'&#39; account has been deleted.';
        return redirect(route('index'))
            ->with('message', $message);
    }

    public function image(User $user)
    {
        $attributes = request()->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($user->profile_image){
            Storage::delete($user->profile_image); // Delete previously stored image, if any.
        }

        $path = request()->file('profile_image')->store('users', 'public'); // Expected string output example: users/picture.jpg
        $user->profile_image = $path; // Expected string output example to be stored into DB: http://127.0.0.1:8000/storage/users/picture.jpg
        $user->save();
        
        return redirect(route('client_user_account.list'))
            ->with('message', 'Profile picture has been saved.');
    }

    public function stats(User $user)
    {
        return view('client_user_account.stats', [
            'plastic_calculator_questions' => PlasticCalculatorQuestion::all(),
            'plastic_calculator_multiple_choices' => PlasticCalculatorMultipleChoice::all(),
            'users' => $user,
            'scores' => Score::all()
        ]); 
    }
}
