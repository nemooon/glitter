<?php

namespace Nemooon\Glitter\Application\Controllers\Admin;

use Nemooon\Glitter\Store;
use Nemooon\Glitter\Page;
use Nemooon\Glitter\Application\Controllers\Controller;
use Nemooon\Glitter\Application\Services\Products;
use Nemooon\Glitter\Domain\Models\Values\ItemId;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Factory as Auth;

class ProductsController extends Controller
{

    public function __construct(Auth $auth, Products $service)
    {
        $this->auth = $auth;
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $me = $this->guard()->user();
        $store = $me->active_store;
        // $products = $store->products;
        $products = $this->service->all();
        return view('glitter::admin.products.index', compact('store', 'products'));
    }

    protected function guard()
    {
        return $this->auth->guard('member');
    }
}
