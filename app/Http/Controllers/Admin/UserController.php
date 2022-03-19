<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users',compact('users'));
    }

    public function view($userId)
    {
        $user = User::whereId($userId)->with('data')
            ->get();

        return view('admin.forms.user-view',compact('user'));
    }

    public function verified($userId): \Illuminate\Http\RedirectResponse
    {
        User::whereId($userId)->update(['verified'=>1]);

        return redirect()->route('admin.users');
    }
}
