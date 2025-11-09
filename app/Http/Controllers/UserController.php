<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);
        if (
            Auth::attempt([
                'username' => $incomingFields['loginusername'],
                'password' => $incomingFields['loginpassword']
            ])
        ) {
            $request->session()->regenerate();

            return redirect()->route('mybooks');
        }
        throw ValidationException::withMessages([
            'loginusername' => ['Invalid login credentials.'],
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function register(Request $request): RedirectResponse
    {

        $incomingFields = $request->validate([
            'image' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'min:3', 'max:10', 'unique:users,username'],
            'password' => 'required'
        ]);

        $incomingFields['password'] = Hash::make($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/mybooks');
    }

}