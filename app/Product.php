<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
	protected $fillable = [
        'name','discreption','category_id','image','purchase_price','sale_price','stock',
    ];
    protected $appends =['image_path'];


    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function getImagePathAttribute()
    {
        return asset('uploads/product_images/' . $this->image);
    }
}
