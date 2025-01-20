<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Deal;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome(){
        $products = Product::inRandomOrder()->take(3)->get();
        $deals = Deal::inRandomOrder()->take(3)->get();
        // dd(compact('products')); 
        return view('frontend.pages.welcome',compact('products','deals'));
    }

    public function product(){
        $products=Product::latest()->paginate(9);
        return view('frontend.pages.product.product',compact('products'));
    }
    public function category(){
        $categories=Category::latest()->paginate(9);
        return view('frontend.pages.category.category',compact('categories'));
    }

    public function deal(){
        $deals=Deal::latest()->paginate(9);
        return view('frontend.pages.welcome',compact('deals'));
    }
    public function search(Request $request){
        $data=$request->all();
        $products=Product::where('name','like','%'.$data['product'].'%')->get();
        // dd($search);
        // $products = Product::inRandomOrder()->take(3)->get();
        $deals = Deal::inRandomOrder()->take(3)->get();
        // dd(compact('products')); 
        return view('frontend.pages.welcome',compact('products','deals'));
    }
}  
