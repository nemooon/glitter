<?php

namespace Nemooon\Glitter\Http\Controllers\Admin\Auth;

use Nemooon\Glitter\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Factory as Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $auth;

    protected $redirectTo = '/admin';

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;

        $this->middleware('glitter.guest:member', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('glitter::admin.auth.login');
    }

    protected function guard()
    {
        return $this->auth->guard('member');
    }
}
