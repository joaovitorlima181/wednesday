<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ProfileController extends Controller
{
    public function index()
    {
        $user =  Auth::user();
        return view('profile.index', compact('user'));
    }

    public function resetPassword(Request $request)
    {
        $user = User::find(Auth::id());

        if(!Hash::check($request->oldPassword, Auth::user()->password)){
            return redirect()->back()->withErrors('Senha atual incorreta.');
        }else{
            $request->user()->forceFill(['password' => Hash::make($request->newPassword)])->save();
            Auth::login($user);
            return redirect()->back();
        }
    }
}
