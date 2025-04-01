<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::paginate(3);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $categories = new Category;

        $categories->name = $request->name;

        $categories->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        return redirect('admin/categories');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->back();
    }
}
