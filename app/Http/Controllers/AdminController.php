<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function list()
    {      
        return view('admins.list', [
            'users' => User::all()
        ]); 
    }

    public function currentURL(Request $request)
    {         
        $currentURL = $request->fullUrl(); // Show full current URL with parameters.
    }

    public function addForm()
    {
        return view('admins.add');
    }
    
    public function add()
    {
        $attributes = request()->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->f_name = $attributes['f_name'];
        $user->l_name = $attributes['l_name'];
        $user->email = $attributes['email'];
        $user->password = Hash::make($attributes['password']);
        $user->is_admin = 1;
        $user->save();

        return redirect(route('admin.list'))
            ->with('message', 'New Admin has been added.');
    }

    public function editForm(User $user)
    {
        return view('admins.edit', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        $attributes = request()->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable',
        ]);

        $user->f_name = $attributes['f_name'];
        $user->l_name = $attributes['l_name'];
        $user->email = $attributes['email'];

        if($attributes['password']) $user->password = Hash::make($attributes['password']); // Password validation to prevent empty string.
        // if($attributes['password']) $user->password = $attributes['password'];

        $user->save();

        return redirect(route('admin.list'))
            ->with('message', 'Admin has been edited.');
    }

    public function delete(User $user)
    {
        if($user->id == auth()->user()->id)
        {
            return redirect(route('admin.list'))
                ->with('message', 'Cannot delete your own admin account. Requires supervisor approval.');
        }
        
        $user->delete();

        return redirect(route('admin.list'))
            ->with('message', 'Admin has been deleted.');                
    }

    public function imageForm(User $user)
    {
        return view('admins.image', [
            'user' => $user,
        ]);
    }

    public function image(User $user)
    {
        $attributes = request()->validate([
            // 'profile_image' => 'required|image',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($user->profile_image){
            Storage::delete($user->profile_image); // Delete previously stored image, if any.
        }

        $path = request()->file('profile_image')->store('users', 'public'); // Expected string output example: users/picture.jpg
        $user->profile_image = $path; // Expected string output example to be stored into DB: http://127.0.0.1:8000/storage/users/picture.jpg
        $user->save();
        
        return redirect(route('admin.list'))
            ->with('message', 'Admin profile picture has been saved.');
    }
}
