<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request) 
    {
        $data = $request->except('__token');
        $data['password'] = Hash::make($data['password']);
        $user = ModelsUser::create($data);

        Auth::login($user);
        return redirect('/dashboard');
    }
}
