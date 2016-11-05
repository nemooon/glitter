<?php

namespace Nemooon\Glitter\Http\Controllers;

use Illuminate\Http\Request;
use Nemooon\Glitter\Http\Controllers\Controller;
use Nemooon\Glitter\Store;

class StoreController extends Controller
{

    public function index(Request $request)
    {
        $stores = Store::all();

        return view('glitter::stores.front', compact('stores'));
    }

}
