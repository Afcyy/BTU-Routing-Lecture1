<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function store(CreateUserRequest $request)
    {
        $user = User::create($request->validated());

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('index'));
    }
    public function checkAuth(Request $request)
    {
        $user = User::where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if(!$user) {
            return back();
        }

        Auth::login($user);

        return redirect(route('index'));
    }
}
