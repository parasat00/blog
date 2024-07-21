<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Library\ApiHelpers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ApiHelpers;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), $this->registerRules());
        if($validator->passes()) {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))
            ]);
            $token = $user->createToken('auth_token', ['reader'])->plainTextToken;
            return $this->onSuccess($token, 'User Registered');
        }
        return $this->onError(400, $validator->errors());
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), $this->loginRules());
        if($validator->passes()) {
            $user = User::where('email', $request->input('email'))->first();
            if(!$user || !Hash::check($request->input('password'), $user->password)){
                return $this->onError(401, 'Invalid credentials');
            }
            $token = $user->createToken('auth_token', [$this->roleToText($user->role)])->plainTextToken;
            return $this->onSuccess($token, 'Logged in');
        }
        return $this->onError(400, $validator->errors());
    }

    public function logout()
    {
        auth('sanctum')->user()->currentAccessToken()->delete();
    }
}
