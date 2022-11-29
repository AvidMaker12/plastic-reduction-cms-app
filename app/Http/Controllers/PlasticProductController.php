<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PlasticProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PlasticProductController extends Controller
{
    public function list()
    {             
        return view('plastic_products.list', [
            'plastic_products' => PlasticProduct::all(),
            // 'users' => $user
            'users' => User::all()
        ]);
    }

    public function addForm()
    {
        return view('plastic_products.add');
    }
    
    public function add()
    {
        $attributes = request()->validate([
            'plastic_product_name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'product_stat' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $plastic_product = new PlasticProduct();
        $plastic_product->plastic_product_name = $attributes['plastic_product_name'];
        $plastic_product->category = $attributes['category'];
        $plastic_product->description = $attributes['description'];
        $plastic_product->product_stat = $attributes['product_stat'];
        $plastic_product->user_id = Auth::user()->id;
        $path_icon = request()->file('icon')->store('plastic_products', 'public');
        $plastic_product->icon = $path_icon;
        $path_image = request()->file('image')->store('plastic_products', 'public');
        $plastic_product->image = $path_image;
        $plastic_product->save();

        $message = 'New Plastic Product &#39;'.$plastic_product->plastic_product_name.'&#39; has been added.';
        return redirect(route('plastic.list'))
            ->with('message', $message);
    }

    public function editForm(PlasticProduct $plastic_product)
    {
        return view('plastic_products.edit', [
            'plastic_product' => $plastic_product,
        ]);
    }

    public function edit(PlasticProduct $plastic_product)
    {
        $attributes = request()->validate([
            'plastic_product_name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'product_stat' => 'required',
        ]);

        $plastic_product->plastic_product_name = $attributes['plastic_product_name'];
        $plastic_product->category = $attributes['category'];
        $plastic_product->description = $attributes['description'];
        $plastic_product->product_stat = $attributes['product_stat'];
        $plastic_product->user_id = Auth::user()->id;
        $plastic_product->save();

        $message = 'Plastic Product &#39;'.$plastic_product->plastic_product_name.'&#39; has been edited.';
        return redirect(route('plastic.list'))
            ->with('message', $message);
    }

    public function delete(PlasticProduct $plastic_product)
    {        
        $plastic_product->delete();
        
        $message = 'Plastic Product &#39;'.$plastic_product->plastic_product_name.'&#39; has been deleted.';
        return redirect(route('plastic.list'))
            ->with('message', $message);            
    }

    public function iconForm(PlasticProduct $plastic_product)
    {
        return view('plastic_products.icon', [
            'plastic_product' => $plastic_product,
        ]);
    }

    public function icon(PlasticProduct $plastic_product)
    {
        $attributes = request()->validate([
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if($plastic_product->icon){
            Storage::delete($plastic_product->icon); // Delete previously stored image, if any.
        }

        $path = request()->file('icon')->store('plastic_products', 'public'); // Expected string output example: users/picture.jpg
        $plastic_product->icon = $path; // Expected string output example to be stored into DB: http://127.0.0.1:8000/storage/users/picture.jpg
        $plastic_product->save();
        
        return redirect(route('plastic.list'))
            ->with('message', 'Plastic Product icon has been saved.');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if($plastic_product->image){
            Storage::delete($plastic_product->image); // Delete previously stored image, if any.
        }

        $path = request()->file('image')->store('plastic_products', 'public'); // Expected string output example: users/picture.jpg
        $plastic_product->image = $path; // Expected string output example to be stored into DB: http://127.0.0.1:8000/storage/users/picture.jpg
        $plastic_product->save();
        
        return redirect(route('plastic.list'))
            ->with('message', 'Plastic Product image has been saved.');
    }
}
