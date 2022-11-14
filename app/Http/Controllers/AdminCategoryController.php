<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class AdminCategoryController extends Controller
{
    public function index()
    {
        // $this->authorize('admin');
        return view('dashboard.categories.index',[
            'categories' => Category::all()
        ]);

    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_category' => 'required'
        ]);

        $categories = Category::create([
            'nama_category' => '$request->nama_category',
            'slug' => Str ($request->nama_category)
        ]);
            

        return redirect('/dashboard/categories')->with('success','New category has ben added!');
    }

    public function show(Category $category)
    {

    }

    public function edit(Category $category)
    {

    }

    public function update(Request $request, Category $category)
    {

    }

    public function destroy(Category $category)
    {

    }
}
