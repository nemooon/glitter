<?php

namespace Nemooon\Glitter\Http\Controllers\Admin;

use Nemooon\Glitter\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Factory as Auth;

class AccountController extends Controller
{

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function index(Request $request)
    {
        return redirect()->route('glitter.admin.account.profile');
    }

    public function profile(Request $request)
    {
        $me = $this->guard()->user();
        return view('glitter::admin.account.profile', compact('me'));
    }

    public function security(Request $request)
    {
        $me = $this->guard()->user();
        return view('glitter::admin.account.security', compact('me'));
    }

    protected function guard()
    {
        return $this->auth->guard('member');
    }
}
