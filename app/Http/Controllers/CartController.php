<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
// use Cart;
class CartController extends Controller
{
    public function insert(Request $request)
    {
        // dd($request->all());
        $dish = Dish::find($request->dish_id);
        if ($request->half_price) {
            Cart ::add([
                'id' => $dish->id,
                'name' => $dish->dish_name.'(Half)',
                'qty' => $request->qty,
                'price' => $dish->full_price,
                'weight' => 550,
                'options' => 
                [
                    'half_price' => $dish->half_price,
                    'image' => $dish->dish_image
                ]
            ]);
        }else {
            Cart ::add([
                'id' => $dish->id,
                'name' => $dish->dish_name,
                'qty' => $request->qty,
                'price' => $dish->full_price,
                'weight' => 550,
                'options' => 
                [
                    'image' => $dish->dish_image
                ]
            ]);
        }
        // dd($cartDish = Cart::content());
        return redirect()->route('cart_show')->with('sms', 'Item added successfully.');
    }
    public function show()
    {
        // Cart::destroy();

        $cartDish = Cart::content();
        return view('Frontend.Cart.show', compact('cartDish')); 
    }
    public function remove($id)
    {
        Cart::remove($id);
        return  back();
    }
    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
        
        return back();
    }
}
