<?php

namespace Nemooon\Glitter\Http\Controllers\Admin\Auth;

use Nemooon\Glitter\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Translation\Translator as Lang;
use Carbon\Carbon;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $auth;

    protected $lang;

    protected $redirectTo = '/admin';

    public function __construct(Auth $auth, Lang $lang)
    {
        $this->auth = $auth;
        $this->lang = $lang;

        $this->middleware('glitter.guest:member', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('glitter::admin.auth.login');
    }

    protected function authenticated(Request $request, $member)
    {
        if ($member->active_store) {
            $last_login_at = Carbon::now();
            $member->activeStore()->updateExistingPivot($member->active_store->getKey(), compact('last_login_at'));
        } else {
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    $this->username() => $this->lang->get('auth.failed'),
                ]);
        }
    }

    protected function guard()
    {
        return $this->auth->guard('member');
    }
}
