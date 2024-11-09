<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class MyAccountController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('my-account.index', $data);
    }


    public function edit_account()
    {
        $data = [
            'title' => 'Edit Account'
        ];
        return view('my-account.edit-account', $data);
    }

    public function action_edit_account(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        if ($request->password !== null || $request->current_password !== null) {
            $request->validate([
                'current_password' => ['required'],
                'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()->mixedCase()],
            ]);

            if (!Hash::check($request->current_password, Auth::user()->password)) {
                return back()->withErrors([
                    'current_password' => __('auth.password'),
                ]);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('my-account.edit-account')->with('success', 'Account has been updated');
    }


}