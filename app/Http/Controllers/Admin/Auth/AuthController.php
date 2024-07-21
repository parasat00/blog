<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Library\ApiHelpers;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiHelpers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email', $request->input('email'))->first();
        if($user && Hash::check($request->input('password'), $user->password) && ($user->role === 1 || $user->role === 2)){
            auth('web')->attempt($data);
            return redirect()->route('posts.index');
        }
        return redirect()->back()->withErrors('Wrong credentials');
    }

    public function create_user(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
//        auth('web')->logout();
//        session()->flush();
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
