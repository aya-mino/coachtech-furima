<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function edit($item_id)
    {
        $user = Auth::user();

        return view('purchase.address', compact('item_id', 'user'));
    }

    public function update(Request $request, $item_id)
    {
        $user = Auth::user();

        $user->update([
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'building' => $request->building,
        ]);

        
        return redirect('/purchase/' . $item_id);
    }
}
