<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products\Product;
use App\Models\Products\ProductVariant;
use Auth;

class HomeController extends Controller
{
    public function getHome(){
        $categorySelling = Category::where('id',1)->first();
        $productSelling = Product::with('product_variants')->whereStatus(1)->where('category_id', $categorySelling->id)->orderBy('id', 'asc')->take(3)->get();
        $categorySpecial = Category::where('id',2)->first();
        $productSpecial = Product::with('product_variants')->whereStatus(1)->where('category_id', $categorySpecial->id)->inRandomOrder(3)->get();
        $categorySlide = Category::where('id', 3)->first();
        $productSlide = Product::with('product_variants')->whereStatus(1)->where('category_id', $categorySlide->id)->get();
        return view('guest.home.index')->with([
            'categorySelling' => $categorySelling,
            'productSelling' => $productSelling,
            'categorySpecial' => $categorySpecial,
            'productSpecial' => $productSpecial,
            'categorySlide'  => $categorySlide,
            'productSlide'  => $productSlide,
        ]);
    }

    public function getDetailProduct($slug){
        $product = Product::with('product_variants')->whereStatus(1)->where('slug',$slug)->first();
        $variant = $product->product_variants->first();
        $image = $variant->image;
        // dd($image);
        return view('guest.product.detail')->with([
            'product' => $product,
            'variant' => $variant,
            'image' => $image,
        ]);

    }

    public function getAllProduct(){
        $categories = Category::whereStatus(1)->get();
        $products = array();
        foreach($categories as $cate){
            $products[$cate->id] = Product::with('product_variants')->whereStatus(1)->where('category_id', $cate->id)->inRandomOrder(4)->get();
        }
        return view('guest.product.all_product_with_cate')->with([
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
