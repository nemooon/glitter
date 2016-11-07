<?php

namespace Nemooon\Glitter\Http\Controllers\Admin\Auth;

use Nemooon\Glitter\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        // $this->middleware('glitter.guest:member');
    }

    public function showLinkRequestForm()
    {
        return view('glitter::admin.auth.passwords.email');
    }

    public function broker()
    {
        return Password::broker('member');
    }
}
