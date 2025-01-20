<?php

namespace App\Http\Controllers;

use App\Models\AddtoCart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Repositories\ProductRepositoryInterface;
use App\Models\Category;
use App\Notifications\CheckoutMailToAdmin;
use App\Notifications\CheckoutMailToUser;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // dd(cartCount());
        return view('backend.product.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        $defaultCategoryId = 4;
        return view('backend.product.create', compact('categories', 'defaultCategoryId'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $newProduct = Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'brand' => $data['brand'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
            'availableSize' => $data['size'],
            'availableColor' => $data['color'],
        ]);

        if (array_key_exists('file', $data)) {
            $extensions = ['jpeg', 'jpg', 'png', 'webp'];
            $ext = pathinfo($data['file']->getClientOriginalName(), PATHINFO_EXTENSION);

            if (in_array(strtolower($ext), $extensions)) {
                $fileSize = $data['file']->getSize() / 1024 / 1024;

                if ($fileSize > 4) {
                    Alert::error('Error', "File should be less than 4MB.");
                    return back();
                } else {
                    $newProduct->addMedia($data['file'])->toMediaCollection('');
                }
            } else {
                Alert::error('Error', "File should be of jpg, jpeg, png, webp format.");
                return back();
            }
        }
        Alert::success('Success', "Product Added Successfully.");
        return redirect(route('product.index'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $data = $request->all();
        $product->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'brand' => $data['brand'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
            'availableSize' => $data['size'],
            'availableColor' => $data['color'],
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extensions = ['jpeg', 'jpg', 'png', 'webp'];
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

            if (in_array(strtolower($ext), $extensions)) {
                $fileSize = $file->getSize() / 1024 / 1024;

                if ($fileSize > 4) {
                    Alert::error('Error', "File should be less than 4MB.");
                    return back();
                } else {
                    $product->addMedia($file)->toMediaCollection('');
                }
            } else {
                Alert::error('Error', "File should be of jpg, jpeg, png, webp format.");
                return back();
            }
        }
        // dd($product);

        Alert::success('Success', "Product Updated Successfully.");
        return redirect(route('product.index'));
    }

    public function edit($id)
    {
        $product = Product::with("media")->find($id);
        // dd($product);
        $categories = Category::all();
        return view('backend.product.edit', compact('product', 'categories'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product deleted successfully');
    }

    public function new()
    {
        return redirect(route('product.create'));
    }

    public function productCart($id)
    {
        $product = Product::with('media')->find($id);
        return view('frontend.pages.product.productCart', compact('product')); //finds product's id and displays product details
    }
    public function cart()
    {
        // $product = Product::with('media')->find($id);
        if (Auth::check()){
            $cartLists = AddtoCart::where('user_id', auth()->user()->id)->get(); //displays cart contents
            // $productDetail=$products->product();

            $user = auth()->user()->name;
            return view('frontend.pages.cart', compact('cartLists', 'user'));
        }else{
            return redirect()->route('login');
        }
    }


    public function addToCart(Request $request)
    {
        $data = $request->all();
        if (auth()->user()) {
            $existingCart = AddtoCart::where("product_id", $data["product_id"])->first();

            if ($existingCart == null) {
                $addToCart = AddtoCart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $data['product_id'],
                    'quantity' => $data['quantity']
                ]);
            } else {
                $existingCart->update([
                    'quantity' => $existingCart->quantity + $data['quantity']
                ]);
            }


            Alert::success('Product added to cart successfully');
            return redirect()->back();
        } else {
            Alert::warning('warning','You need to login for adding item to cart');
            return redirect()->route('login');
        }
        return redirect()->route('cart')->with('success', "Added to Cart");
    }

    public function removeFromCart($id)
    {
        $cartItem = AddtoCart::find($id);
        if ($cartItem) {
            $cartItem->delete();
        }
        return redirect()->route('cart')->with('success', "Removed from Cart");
    }

    protected function checkout(Request $request)
    {
        $data = $request->all();
        $user = auth()->user()->id;  //gets the id of user who is currently logged in
        $cartLists = AddtoCart::where('user_id', $user)->get();
        $user = auth()->user();
        $mail = "admin@techart.com";
        if ($cartLists) {
            Notification::route('mail', $mail)->notify(new CheckoutMailToAdmin($cartLists, $user));
            Notification::route('mail', $user->email)->notify(new CheckoutMailToUser($cartLists, $user));
            foreach ($cartLists as $key => $value) {
                $value->delete();
            }
            Alert::success('success', 'Order has been placed successfully');
            return redirect()->back();
        }
        else{
            Alert::error('error', 'Your cart is empty');
            return redirect()->back();
        }
    }
    public function sortProduct(){
        
    }
}
