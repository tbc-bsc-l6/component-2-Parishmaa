<?php

namespace App\Http\Controllers;
use App\Models\Deal;
use App\Models\Category;
use Illuminate\Http\Request;

class DealsController extends Controller
{
    public function index()
    {
        $deal = Deal::all();
        return view('backend.deals.index', ['deals' => $deal]);
        // return view('backend.deals.index');
    }

    public function create()
{
    $categories = Category::all();
    return view('backend.deals.create', ['categories' => $categories]);
}

    public function store(Request $request)
    {
        dd($request->all());
        $data = $request->validate([
        'name' => 'required',
        'type' => 'required',
        'description' => 'required',
        'price' => 'required',
        'discount' => 'required',
        'expiration_date' => 'required',
        'status' => 'required',
        'category' =>'required',
        ]);

        $newDeal = Deal::create($data);
        return redirect(route('backend.deals.index'))->with('success', 'Deal created successfully');
    }

}