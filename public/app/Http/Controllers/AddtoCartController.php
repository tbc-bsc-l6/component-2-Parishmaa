<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class AddtoCartController extends Controller
{
    // public function addToCart($id)
    // {
    //     $product = Product::with('media')->find($id);
    //     return view('frontend.pages.cart', compact('product'));
    // }
//     public function addToCart(Request $request, $id)
// {
//     $product = Product::with('media')->find($id);
//     return view('frontend.pages.cart', compact('product'));
//     $user = Auth::user();
//     $quantity = $request->input('quantity');
//     return response()->json([
//         'product_id' => $product->id,
//         'user_id' => $user->id,
//         'quantity' => $quantity
//     ]);
// }
}
