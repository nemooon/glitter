<?php

namespace Nemooon\Glitter\Http\Controllers\Account\Auth;

use Nemooon\Glitter\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Contracts\Auth\Factory as Auth;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $auth;

    protected $redirectTo = '/account';

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;

        $this->middleware('glitter.guest:customer');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('glitter::account.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function guard()
    {
        return $this->auth->guard('customer');
    }
}
