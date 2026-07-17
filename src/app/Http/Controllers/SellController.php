<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Http\Requests\ExhibitionRequest;
use App\Models\Category;
use App\Models\Condition;

class SellController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $conditions = Condition::all();

        return view('sell', compact(
            'categories',
            'conditions',
        ));
    }

    public function store(ExhibitionRequest $request)
    {
        $imagePath = $request->file('image')->store('items', 'public');

        $item = Item::create([
            'user_id' => Auth::id(),
            'condition_id' => $request->condition_id,
            'name' => $request->name,
            'brand_name' => $request->brand_name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'is_sold' => false,
        ]);

        $item->categories()->attach($request->categories);

        return redirect('/');
    }
}
