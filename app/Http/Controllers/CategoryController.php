<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $data['categorycount'] = Category::count();
        return view('categories.category', $data, ['categories' => $categories]);
    }

    public function add()
    {
        $data['title'] = 'Add Category';


        return view('categories.category-add', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);

        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'Category added successfully.');
    }

    public function edit($slug)
    {
        $data['title'] = 'Edit Category';
        $data['category'] = Category::where('slug', $slug)->first();

        return view('categories.category-edit', $data);
    }

    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());

        return redirect('categories')->with('status', 'Category updated successfully.');
    }


    public function destroy(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete($request->all());
        return redirect('categories')->with('status', 'Category deleted successfully.');
    }
}
