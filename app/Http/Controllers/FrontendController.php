<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $dishes = Dish::where('dish_status', 1)->get();
        return view('Frontend.Home.home', compact( 'dishes'));
    }
    public function all_dish()
    {
        $dishes = Dish::where('dish_status', 1)->get();
        return view('Frontend.Dish.allDish', compact( 'dishes'));
    }
    public function show_dish($id)
    {
        $dishes = Dish::where('dish_status', 1)->where('category_id', $id)->get();
        return view('Frontend.Dish.dish', compact( 'dishes'));
    }
}
