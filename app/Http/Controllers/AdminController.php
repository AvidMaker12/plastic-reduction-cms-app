<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $user->save();

        return redirect('admins.list')
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

        if($attributes['password']) $user->password = Hash::make($attributes['password']);
        // if($attributes['password']) $user->password = $attributes['password'];

        $user->save();

        return redirect(route('admin.list'))
            ->with('message', 'Admin has been edited.');

    }

    public function delete(User $user)
    {

        // if($user->id == auth()->user()->id)
        // {
        //     return redirect('/console/users/list')
        //         ->with('message', 'Cannot delete your own user account!');        
        // }
        
        $user->delete();

        return redirect('/console/users/list')
            ->with('message', 'User has been deleted!');                
        
    }

    public function imageForm(PlasticProduct $plastic_product)
    {
        return view('plastic_products.image', [
            'plastic_product' => $plastic_product,
        ]);
    }

    public function image(PlasticProduct $plastic_product)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Storage::delete($plastic_product->image);
        
        $path = request()->file('image')->store('plastic_products');
        // $path = request()->file('image')->store('plastic_products', 's3');

        $plastic_product->image = $path;
        // $plastic_product->image = Storage::disk('s3')->url($path);
        $plastic_product->save();
        
        return redirect('/console/plastic-products/list')
            ->with('message', 'Plastic product image has been edited.');
    }
}
