<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index($item_id)
    {
        $item = Item::find($item_id);

        if ($item->is_sold){
            return redirect('/');
        }
        
        $user = Auth::user();

        return view('purchase.index', compact('item', 'user'));
    }

    public function store(Request $request, $item_id)
    {
        $item = Item::find($item_id);

        if ($item->is_sold) {
            return redirect('/');
        }

        $user = Auth::user();

        Purchase::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'payment_method' => $request->payment_method,
            'postal_code' => $user->postal_code,
            'address' => $user->address,
            'building' => $user->building,
        ]);
        
        $item->update([
            'is_sold' => true,
        ]);

        return redirect('/');
    }
}
