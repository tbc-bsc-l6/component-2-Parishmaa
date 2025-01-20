<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a list of orders for the admin.
     */
    public function index()
    {
        // Fetch all orders with the associated user details for the admin panel
        $orders = Order::with('user')->paginate(10); // Use eager loading to fetch related user data
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display a list of orders for the authenticated user.
     */
    public function show()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if a user is logged in
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to log in to view your orders.');
        }

        // Fetch the user's orders
        $orders = $user->orders()->orderBy('created_at', 'desc')->get(); // Order by latest

        return view('profile', compact('user', 'orders'));
    }

    /**
     * Store a new order in the database (checkout).
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'total' => 'required|numeric|min:0',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to log in to place an order.');
        }

        try {
            // Create a new order
            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'pending', // Default status for a new order
                'total' => $request->total, // Total amount from the request
            ]);

            // (Optional) Clear the user's cart or perform any additional actions

            return redirect()->route('profile')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to place order: ' . $e->getMessage());
        }
    }
}
