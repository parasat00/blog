<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('self.or.admin')->except(['index']);
    }

    public function index()
    {
        $users = User::where('id', '!=', auth('web')->id())->paginate(10);
        return view('user.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }
    public function editPassword(User $user)
    {
        return view('user.editPassword', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];
        if($request->email === $user->email) {
            $rules['email'] = 'required|email|unique:users,email,'. $user->id .',id';
        }else {
            $rules['email'] = 'required|string|email|max:255|unique:users';
        }
        $data = $this->validate($request, $rules);
        $user->update($data);
        return redirect()->route('users.show', $user->id);
    }

    public function updatePassword(User $user, Request $request)
    {
        $rules = [
            'password' => 'required|confirmed|string|min:6'
        ];
        $data = $this->validate($request, $rules);
        if (Hash::check($data['password'], $user->password)) {
            return redirect()->back()->withErrors('The same as previous password');
        }
        $user->password = bcrypt($data['password']);
        $user->save();
        return redirect()->route('users.show', $user->id);
    }
}
