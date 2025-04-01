<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $products = Product::where('user_id', Auth::id())->get();
        $categories = Category::all();
        return view('admin.products.index', compact('products' , 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create' ,compact('categories'));
    }

    public function store(Request $request)
    {
        $products = new Product;

        $products->name = $request->name;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->category_id = $request->category;
        $products->user_id = Auth::id();

        $products->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $category_name = Category::where('id' ,$product->category_id)->first();
        // طريقة اخرى
        // $category_name = Category::find($product->category_id)->first();
        return view('admin.products.edit', compact('product' , 'categories' , 'category_name'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category;

        $product->save();

        return redirect('admin/products');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect()->back();
    }
}
