<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all(),
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'email' => ['required'],
        ]);
        $data['password'] = Hash::make('merci123');
        User::create($data);

        return redirect()->back()->with('success', 'User created with default password');
    }

    public function profile()
    {
        return view('admin.profile.profile');
    }

    public function changePassword(User $user)
    {
        $data = \request()->validate([
            'currentPassword' => ['required'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required']
        ]);
        if (!Hash::check($data['currentPassword'], $user->password)) {
            return redirect()->back()->with('error', 'Current password incorrect');
        }
        $user->update([
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->back()->with('success', 'Password changed');
    }
}
