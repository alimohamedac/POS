<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::paginate(3);
        return view('backend.modules.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('backend.modules.categories.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
        ]);

        $category = Category::create([
            'name'  => $request->name,
        ]);

        session()->flash('message', trans('backend/messages.success.added'));
        return redirect()->route('backend.categories.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
