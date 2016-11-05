<?php

namespace Nemooon\Glitter\Http\Controllers\Admin;

use Nemooon\Glitter\Store;
use Nemooon\Glitter\Page;
use Nemooon\Glitter\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Factory as Auth;

class CustomersController extends Controller
{

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function index(Request $request)
    {
        $me = $this->guard()->user();
        $customers = [];
        return view('glitter::admin.customers.index', compact('customers'));
    }

    protected function guard()
    {
        return $this->auth->guard('member');
    }
}
