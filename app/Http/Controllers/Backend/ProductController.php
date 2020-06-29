<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    
    public function index()
    {
        $text = request('q');

        $categories = Category::all();

        $products = Product::where('name', 'like', '%'.$text.'%')
            ->orWhere('discreption','like','%'.$text.'%')
            ->latest()->paginate(3);
        return view('backend.modules.products.index',compact('categories','products','text'));
    }

    
    public function create()
    {
        $categories = Category::all();
        return view('backend.modules.products.create',compact('categories'));        
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required',
            'category_id'     => 'required',
            'discreption'     => 'required',
            'image'           => 'image|nullable',
            'purchase_price'  => 'required',
            'sale_price'      => 'required',
            'stock'           => 'required',

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

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('backend.modules.products.edit',compact('product','categories'));
    }

    public function update(Request $request,Product $product)
    {
        $request->validate([
            'name'            => 'required|unique:products,name,'. $product->id,
            'category_id'     => 'required',
            'discreption'     => 'required',
            'image'           => 'image|nullable',
            'purchase_price'  => 'required',
            'sale_price'      => 'required',
            'stock'           => 'required',

        ]);

        $request_data = $request->all();

        if($request->image)
        {
            if($product->image != 'default.png')   //a4an delete oldImage mn public
            {
                Storage::disk('public_uploads')->delete('/product_images/' . $product->image);  //storagedisk tb3 ->config.fileSystem
            }

            Image::make($request->image)->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
            })
            ->save(public_path('uploads/product_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }

        $product->update($request_data);

        session()->flash('message', trans('backend/messages.success.updated'));
        return redirect()->route('backend.products.index');

    }

    public function destroy(Product $product)
    {
        if($product->image != 'default.png')         //34an delete it mn public
        {
            Storage::disk('public_uploads')->delete('/product_images/' . $product->image);  //storagedisk tb3 ->config.fileSystem
        }  

        $product->delete();
        session()->flash('message', trans('backend/messages.success.deleted'));
        return redirect()->route('backend.products.index');
    }
}
