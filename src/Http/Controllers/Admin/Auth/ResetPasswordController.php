<?php

namespace Nemooon\Glitter\Http\Controllers\Admin\Auth;

use Nemooon\Glitter\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $auth;

    protected $redirectTo = '/admin';

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;

        // $this->middleware('glitter.guest:member');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('glitter::admin.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function broker()
    {
        return Password::broker('member');
    }

    protected function guard()
    {
        return $this->auth->guard('member');
    }
}
