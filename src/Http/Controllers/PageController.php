<?php

namespace Nemooon\Glitter\Http\Controllers;

use Illuminate\Http\Request;
use Nemooon\Glitter\Http\Controllers\Controller;
use Nemooon\Glitter\Store;
use Nemooon\Glitter\Page;

class PageController extends Controller
{

    public function front(Request $request, $store)
    {
        $store = Store::where('slug', '=', $store)->firstOrFail();
        $pages = Page::where('store_id', $store->getKey())->whereNull('parent_id')->get();

        return view('glitter::pages.front', compact('store', 'pages'));
    }

    public function page(Request $request, $store, $path)
    {
        $store = Store::where('slug', '=', $store)->firstOrFail();
        $page = Page::path($path)->where('store_id', $store->getKey())->with('store')->firstOrFail();

        return view('glitter::pages.single', compact('store', 'page'));
    }

}
