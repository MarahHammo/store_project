<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        // للعرض بناء على الصنف المختار
        $category_id = $request->query('category');
        $categories = Category::all();
        $products = Product::all();

        if ($category_id) {
            $products = $products->where('category_id', $category_id);
        }


        // لعرض جميع المنتجات
        // $products = Product::all();

        // لو بدي اعرض عدد معين فقط وليس الجميع
        // $products = Product::take(3)->get();

        return view('home.index', compact('products', 'categories'));
    }
}
