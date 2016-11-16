<?php

namespace Nemooon\Glitter\Application\Controllers\Admin;

use Nemooon\Glitter\Application\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Factory as Auth;

class SettingsController extends Controller
{

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function index(Request $request)
    {
        $store = $this->guard()->user()->activeStore;
        return view('glitter::admin.settings.index', compact('store'));
    }

    public function members(Request $request)
    {
        $store = $this->guard()->user()->activeStore;
        $members = $store->members;
        return view('glitter::admin.settings.members', compact('store', 'members'));
    }

    protected function guard()
    {
        return $this->auth->guard('member');
    }
}
