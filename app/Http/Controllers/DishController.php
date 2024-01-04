<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class DishController extends Controller
{
    public function index()
    {
        $categories = Category::where('category_status', 1)->get();
        return view('Backend.dish.add', compact('categories'));
    }
    public function save(Request $request)
    {

        if ($request-> hasFile('dish_image')) {
            $file = $request->file('dish_image');
            $directory = 'BackendSourceFiles/images/dish/';
            if ($file-> isValid()) {
                $file_name = date('Ymdhms').'.'.$file-> getClientOriginalExtension();
                // $file-> storeAs('dish', $file_name);
                $imgUrl = $directory.$file_name;
                $file-> move($directory, $file_name);
            }
        }
        
        Dish::create([
            'dish_name' => $request -> dish_name,
            'category_id' => $request -> category_id,
            'dish_detail' => $request -> dish_detail,
            'dish_status' => $request -> dish_status,
            'full_price' => $request -> full_price,
            'half_price' => $request -> half_price,
            'dish_image' =>  $imgUrl ,
        ]);

        return back()-> with('sms', 'Dish saved.');
    }
    public function manage()
    {
        $dishes = Dish::all();
        $categories = Category::where('category_status', 1)->get();

        return view('Backend.dish.manage', compact('dishes', 'categories'));
    }
    public function dish_delete($id)
    {
        $dish = Dish::find($id);
        $image_path = $dish->dish_image;
        if (fileExists($image_path)) {
            unlink($image_path);
        }

        $dish->delete();
        return back()->with('sms', 'Deleted Successfully');
    }
    public function status_update($id, $status)
    {
        $dish = Dish::find($id);
        if ($dish->dish_status == 1) {
            $dish->update([
                'dish_status' => $status
            ]);
        } else {
            $dish->update([
                'dish_status' => $status
            ]);
        }
        
        return back();
    }

    public function update(Request $request)
    {
        $dish = Dish::find($request->id);
        $old_img = $dish->dish_image;

        if ($request-> hasFile('dish_image')) {
            $file = $request->file('dish_image');
            $directory = 'BackendSourceFiles/images/dish/';
            if ($file-> isValid()) {
                $file_name = date('Ymdhms').'.'.$file-> getClientOriginalExtension();
                $imgUrl = $directory.$file_name;
                $file-> move($directory, $file_name);

                if (fileExists($old_img)) {
                    unlink($old_img);
                }
                $dish->update([
                    'dish_image' =>  $imgUrl ,
                ]);
            }
        }

        if ($request->category_id) {
            $dish->update([
                'dish_name' => $request -> dish_name,
                'category_id' => $request -> category_id,
                'dish_detail' => $request -> dish_detail,
                'full_price' => $request -> full_price,
                'half_price' => $request -> half_price,
            ]);
        }
        else {
            $dish->update([
                'dish_name' => $request -> dish_name,
                'dish_detail' => $request -> dish_detail,
                'full_price' => $request -> full_price,
                'half_price' => $request -> half_price,
            ]);
        }

        
        
        return redirect()->back()->with('sms', 'Updated Successfully');
    }
}
