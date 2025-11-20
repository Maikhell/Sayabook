<?php

namespace App\Http\Controllers;

use Log;
use View;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
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
    public function updateUserDetails(Request $request)
    {
        $user = auth()->user();
        $validatedData = $request->validate([
            'image' => ['image'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'username' => ['required', 'string', 'max:255'],
            'currentPassword' => ['string'],
            'newPassword' => [ 'string'],
        ]);
        if ($request->hasFile('image')) {
            if ($user->image && !str_contains($user->image, 'default_')) {
                Storage::disk('public')->delete($user->image);
            }
            $path = $request->file('image')->store('profile_images', 'public');
            $user->image = $path; 
        }
        if ($request->filled('newPassword')) {
            if (!$request->filled('currentPassword')) {
                return back()->withErrors(['currentPassword' => 'The current password is required to set a new password.']);
            }
            if (\Hash::check($validatedData['currentPassword'], $user->password)) {
                $user->password = \Hash::make($validatedData['newPassword']);
            } else {
                return redirect()->back()->withErrors(['currentPassword' => 'The provided current password does not match your record.']);
            }
        }
        $user->email = $validatedData['email'];
        $user->username = $validatedData['username'];
        $user->save();

        return redirect()->back()->with('success', 'User Details updated successfully!');
    }

}