<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function list()
    {      
        return view('users.list', [
            'users' => User::all()
        ]); 
    }

    public function currentURL(Request $request)
    {         
        $currentURL = $request->fullUrl(); // Show full current URL with parameters.
    }

    public function addForm()
    {

        return view('users.add');

    }
    
    public function add()
    {
        $attributes = request()->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->username = $attributes['username'];
        $user->email = $attributes['email'];
        $user->password = Hash::make($attributes['password']);
        $user->save();

        return redirect('users.list')
            ->with('message', 'New User has been added.');
    }

    public function editForm(User $user)
    {

        return view('users.edit', [
            'user' => $user,
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
        // if($attributes['password']) $user->password = $attributes['password'];

        $user->save();

        return redirect(route('user.list'))
            ->with('message', 'User has been edited.');
    }

    public function delete(User $user)
    {

        // if($user->id == auth()->user()->id)
        // {
        //     return redirect('/console/users/list')
        //         ->with('message', 'Cannot delete your own user account!');        
        // }
        
        $user->delete();

        return redirect(route('user.list'))
            ->with('message', 'User has been deleted!');                
    }

    public function imageForm(User $user)
    {
        return view('users.image', [
            'user' => $user,
        ]);
    }

    public function image(User $user)
    {

        $attributes = request()->validate([
            'profile_image' => 'required|image',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Storage::delete($user->profile_image); // Delete previously stored image, if any.
        
        $path = request()->file('profile_image')->store('users');
        $user->profile_image = $path;
        $user->save();
        
        return redirect(route('user.list'))
            ->with('message', 'User profile picture has been edited.');
    }
}
