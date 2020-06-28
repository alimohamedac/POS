<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::paginate(2);
        return view('backend.modules.products.index',compact('products'));
    }

    
    public function create()
    {
        $categories = Category::all();
        return view('backend.modules.products.create',compact('categories'));        
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'category_id' => 'required',
            'discreption'  => 'required',
            'image'     => 'image|nullable',
            'purchase_price'  => 'required',
            'sale_price'  => 'required',
            'stock'  => 'required',

        ]);

        $request_data = $request->all();

        if($request->image)
        {
            Image::make($request->image)->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
            })
            ->save(public_path('uploads/product_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }

        $product = Product::create($request_data);
          /*  $product = new Product;
            $product->name = request('name');
            $product->category_id = request('category_id');
            $product->discreption = request('discreption');      
            $product->image = request('image');
            $product->purchase_price = request('purchase_price');      
            $product->sale_price = request('sale_price');      
            $product->stock = request('stock');      

           
            $product->Save(); */

        session()->flash('message', trans('backend/messages.success.added'));
        return redirect()->route('backend.products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
