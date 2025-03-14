<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::get();
        return view('products.index',['products'=>$products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        //    dd($request);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'mrp' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png|max:10000',
        ], [
            'name.required' => 'The Name field is required.',
            'description.required' => 'The Description field is required.',
            'mrp.required' => 'The MRP field is required.',
            'mrp.numeric' => 'The MRP field must be a valid number.',
            'price.required' => 'The Price field is required.',
            'price.numeric' => 'The Price field must be a valid number.',
            'image.required' => 'Please upload an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'image.max' => 'The image size must not exceed 10MB.',
        ]);

        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imagename);

        $product=new product;
        $product->image=$imagename;
        $product->name= $request->name;
        $product->description= $request->description;
        $product->mrp= $request->mrp;
        $product->price= $request->price;
        $product->save();
        return back()->withSuccess('Product Added Successfully...');

    }

    public function show($id)
    {
        $products = product::where('id' ,$id)->first();
        return view('products.show',['products'=>$products]);
    }

    
    public function edit($id)
    {
        $products = product::where('id' ,$id)->first();
        return view('products.edit',['products'=>$products]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'mrp' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:10000',
        ], [
            'name.required' => 'The Name field is required.',
            'description.required' => 'The Description field is required.',
            'mrp.required' => 'The MRP field is required.',
            'mrp.numeric' => 'The MRP field must be a valid number.',
            'price.required' => 'The Price field is required.',
            'price.numeric' => 'The Price field must be a valid number.',
            'image.required' => 'Please upload an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'image.max' => 'The image size must not exceed 10MB.',
        ]);

        $product = product::where('id' ,$id)->first();


        if (isset($request->image)) {
            $imagename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imagename);
            $product->image = $imagename;
        }

        $product->name= $request->name;
        $product->description= $request->description;
        $product->mrp= $request->mrp;
        $product->price= $request->price;
        $product->save();
        return back()->withSuccess('Product Details Updated Successfully...');

    }

    public function delete($id)
    {
        $products = product::where('id' ,$id)->first();
        $products->delete();
        return back()->withSuccess('Product Details Deleted Successfully...');
    }
}
