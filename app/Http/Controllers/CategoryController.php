<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Repositories\CategoryRepositoryInterface;
use App\Models\Category;


class CategoryController extends Controller
{
    //
    public function categoryIndex()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }

    // public function categoryCreate()
    // {
    //     return view('category.categoryCreate');
    // }

    public function categoryStore(Request $request)
    {
        $data=$request->all();
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'description' => 'nullable',
        ]);
        
        $newCategory = Category::create($data);

        if (array_key_exists('file', $data)) {
            $extensions = ['jpeg', 'jpg', 'png', 'webp'];
            $ext = pathinfo($data['file']->getClientOriginalName(), PATHINFO_EXTENSION);

            if (in_array(strtolower($ext), $extensions)) {
                $fileSize = $data['file']->getSize() / 1024 / 1024;

                if ($fileSize > 4) {
                    Alert::error('Error', "File should be less than 4MB.");
                    return back();
                } else {
                    $newCategory->addMedia($data['file'])->toMediaCollection('');
                }

            } else {
                Alert::error('Error', "File should be of jpg, jpeg, png, webp format.");
                return back();
            }
        }
        Alert::success('Success', "Category Added Successfully.");
        return redirect(route('category.index'));
    }

    public function categoryUpdate(Request $request, $id)
{
    $data = $request->all();
    $category = Category::find($id);
    $category->update($data);

    if (array_key_exists("img",$data)) { //key=>img, checks img in $data[array]
        $file = $data['img'];
        // dd($file);
        $extensions = ['jpeg', 'jpg', 'png'];
        $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

        if (in_array(strtolower($ext), $extensions)) {
            $fileSize = $file->getSize() / 1024 / 1024;

            if ($fileSize > 4) {
                Alert::error('Error', "File should be less than 4MB.");
                return back();
            } else {
                $category->media()->delete();

                $category->addMedia($file)->toMediaCollection('');
            }

        } else {
            Alert::error('Error', "File should be of jpg, jpeg, png, webp format.");
            return back();
        }
    }

    Alert::success('Success', "Product Updated Successfully.");
    return redirect(route('category.index')); 
}
    
    public function categoryDelete($categoryId)
    {
        // dd($categoryId);
        $category = Category::find($categoryId);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }

    private function getCategoryTypes()
{
    return ['Electronics', 'Fashion', 'Home Goods', 'Sports']; 
}

public function categoryCreate()
{
    $types = $this->getCategoryTypes();
    return view('backend.category.create', compact('types'));
}

public function categoryEdit($categoryId)
{
    $category = Category::with("media")->find($categoryId);
    $types = $this->getCategoryTypes();
    return view('backend.category.edit', compact('category', 'types'));
}

public function categoryProducts($categoryId)
{
    $category = Category::with('media')->find($categoryId);
    // dd($category);
    $products = Product::where('category_id',$categoryId)->get();
    $categories = Category::all(); 

    return view('frontend.pages.category.categoryProducts', compact('products', 'category', 'categories'));
}
}
