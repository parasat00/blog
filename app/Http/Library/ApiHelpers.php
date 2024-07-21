<?php

namespace App\Http\Library;

use http\Env\Request;

trait ApiHelpers
{
    public function roleToText(int $role):string
    {
        return $role === 1 ? 'admin' : ($role === 2 ? 'writer' : 'reader');
    }
    protected function isAdmin($user):bool
    {
        if(!empty($user)) {
            return $user->tokenCan('admin');
        }
        return false;
    }

    protected function registerRules() {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ];
    }
    protected function loginRules() {
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ];
    }

    protected function onSuccess($data, string $message = '', int $code = 200) {
        return response()->json([
            'status' => $code,
            'message' => $message,
            'data' => $data
        ], $code);
    }
    protected function onError(int $code, string $message) {
        return response()->json([
            'status' => $code,
            'message' => $message
        ], $code);
    }

}
