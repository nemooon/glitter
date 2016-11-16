<?php

namespace Nemooon\Glitter\Application\Controllers;

use Illuminate\Http\Request;
use Nemooon\Glitter\Application\Controllers\Controller;
use Nemooon\Glitter\Store;

class StoreController extends Controller
{

    public function index(Request $request)
    {
        $stores = Store::all();

        return view('glitter::stores.front', compact('stores'));
    }

}
