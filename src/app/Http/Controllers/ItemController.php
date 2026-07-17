<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->query('tab');

        $items = Item::query();

        if (Auth::check()) {
            $items->where('user_id', '!=', Auth::id());
        }

        if ($request->filled('keyword')) {
            $items->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($tab === 'mylist') {

            if (!Auth::check()) {
                $items->whereRaw('1 = 0');
            } else {
                $items->whereHas('likes', function ($query) {
                    $query->where('user_id', Auth::id());
                });
            }
        }

        $items = $items->get();

        return view('index', compact('items'));
    }

    public function show($item_id)
    {
        $item = Item::with(['condition', 'categories', 'comments.user'])
            ->withCount('comments', 'likes')
            ->find($item_id);

        $isLiked = $item->likes()
            ->where('user_id', Auth::id())
            ->exists();

        return view('item.show', compact('item', 'isLiked'));
    }
}