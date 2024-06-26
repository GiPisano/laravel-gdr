<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate();

        if (!$items) {
            abort(404);
        }

        return view('guest.items.home', compact('items'));
    }
}
