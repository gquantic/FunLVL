<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::whereId(Auth::id())->with('data')
            ->first();

        return view('profile',compact('user'));
    }

    public function post(UserRequest $request): \Illuminate\Http\RedirectResponse
    {
        UserData::whereId(Auth::id())->updateOrCreate(
            array_merge(
                $request->all('description'),
                $request->storeFileIfExists('avatar'),
                $request->storeFileIfExists('header'),
                ['user_id'=>Auth::id()]
            )
        );

        return redirect()->back();
    }

    public function user(int $userId)
    {
        $user = User::find($userId);

        return view('user', compact('user'));
    }
}
