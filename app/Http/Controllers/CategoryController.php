<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
	public function index()
	{
	    $categories = Category::all();
	    return view('categories.index', compact('categories'));
	}

	public function create()
	{
	    return view('categories.create');
	}

	public function store(Request $request)
	{
	    $category = new Category;
	    $category->name = $request->name;
	    $category->save();

	    return redirect()->route('categories.index');
	}

	public function edit(Category $category)
	{
	    return view('categories.edit', compact('category'));
	}

	public function update(Request $request, Category $category)
	{
	    $category->name = $request->name;
	    $category->save();

	    return redirect()->route('categories.index');
	}

	public function destroy(Category $category)
	{
	    $category->delete();

	    return redirect()->route('categories.index');
	}
}
