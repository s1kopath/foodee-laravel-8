<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{
    public function index()
    {
        return view('Backend.category.addCategory');
    }
    public function save(Request $request)
    {
        Category::create([
            'category_name' => $request -> category_name,
            'order_number' => $request -> order_number,
            'category_status' => $request -> category_status,
            'added_on' => $request -> added_on
        ]);

        return back()-> with('sms', 'Category saved.');
    }
    public function manage()
    {
        $categories = Category::all();
        return view('Backend.category.manageCategory', compact('categories'));
    }
    public function active($id)
    {
        $category = Category::find($id);
        $category->update([
            'category_status' => 1
        ]);
        return back();
    }
    public function inactive($id)
    {
        $category = Category::find($id);
        $category->update([
            'category_status' => 0
        ]);
        return back();
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back()->with('sms','Deleted Successfully');
    }
    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->update([
            'category_name' => $request -> category_name,
            'order_number' => $request -> order_number,
        ]);
        return redirect()->back()->with('sms','Updated Successfully');
    }
}
