<?php

namespace Nemooon\Glitter\Application\Controllers\Account\Auth;

use Nemooon\Glitter\Customer;
use Nemooon\Glitter\Application\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Contracts\Validation\Factory as Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $auth;

    protected $validator;

    protected $redirectTo = '/account';

    public function __construct(Auth $auth, Validator $validator)
    {
        $this->auth = $auth;

        $this->validator = $validator;

        $this->middleware('glitter.guest:customer');
    }

    public function showRegistrationForm()
    {
        return view('glitter::account.auth.register');
    }

    protected function validator(array $data)
    {
        return $this->validator->make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function guard()
    {
        return $this->auth->guard('customer');
    }
}
