<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $text = request('q');

        $categories = Category::where('name', 'like', '%'.$text.'%')
            ->latest()->paginate(5);
        return view('backend.modules.categories.index',compact('categories','text'));
    }

    public function create()
    {
        return view('backend.modules.categories.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:categories,name',
        ]);

        $category = Category::create($request->all());

        session()->flash('message', trans('backend/messages.success.added'));
        return redirect()->route('backend.categories.index');
    }

    
    public function edit(Category $category)
    {
        return view('backend.modules.categories.edit',compact('category')); 
    }

    public function update(Request $request,Category $category)
    {
        $request->validate([
            'name'  => 'required|unique:categories,name,'. $category->id,     //34an ignore 
        ]);

        $category->update($request->all());

        session()->flash('message', trans('backend/messages.success.updated'));
        return redirect()->route('backend.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('message', trans('backend/messages.success.deleted'));
        return redirect()->route('backend.categories.index');

    }
}
