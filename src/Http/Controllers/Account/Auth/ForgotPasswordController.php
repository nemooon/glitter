<?php

namespace Nemooon\Glitter\Http\Controllers\Account\Auth;

use Nemooon\Glitter\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('glitter.guest:customer');
    }

    public function showLinkRequestForm()
    {
        return view('glitter::account.auth.passwords.email');
    }
}
