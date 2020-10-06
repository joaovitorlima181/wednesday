<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('forgot-password.index');
    }

    public function send(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function reset($token)
    {

        return view('forgot-password.reset', ['token' => $token]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            '_token' => 'required',
            'email' => 'required|email',
            'newPassword' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->forceFill(['password' => Hash::make($request->newPassword)])->save();
        Artisan::call('auth:clear-resets');
        return redirect('/');

        // $status = Password::reset(
        //     $request->only('email', 'newPassword', '_token')
        // );

        // return $status == Password::PASSWORD_RESET
        //     ? redirect()->route('/login')->with('status', __($status))
        //     : back()->withErrors(['email' => __($status)]);
    }
}




// $status = Password::reset(
//     $request->only('email', 'newPassword', 'token'),
//     function ($user, $newPassword) use ($request, $token) {
//         dd($user);
//         $user->forceFill([
//             'password' => Hash::make($newPassword)
//         ])->save();

//         $user->setRememberToken(Str::random(60));

//         event(new PasswordReset($user));
//     }
// );
