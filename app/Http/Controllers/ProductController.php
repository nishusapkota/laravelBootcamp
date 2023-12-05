<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PostStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('product.index',compact('products'));
    }

    public function create(){
        return view('product.create');   
    }

    public function store(PostStoreRequest $request){
        $image_name=time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('product'),$image_name);
        $path='product/'.$image_name;
       
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path
        ]);
        return redirect()->route('product.index')->with('message','Product added successfully');
    }

    public function destroy(Product $product){
        // dd($product->name);
        $image_path=$product->image;
        if(File::exists($image_path)){
            unlink(public_path($product->image));
        }
       $product->delete();
       return redirect()->back()->with('danger','Product deleted successfully');
    }

    public function edit(Product $product){
        // dd($product->name);
        return view('product.edit',compact('product'));  
    }

    public function update(Product $product,Request $request){
        $request->validate([
            'name' =>'required',
            'description' =>'required|max:30',
            'image' => 'image|mimes:jpeg,png,jpg,gif'
        ]);
        if($request->hasFile('image')){
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }       
         $image=$request->file('image');
            $image_name=time().$image->getClientOriginalName();
            $product->image='product/'.$image_name;
        }
        $product->name=$request->name;
        $product->description=$request->description;+
        $product->save();
        return redirect()->route('product.index')->with('message','Product updated successfully');
    }
}
