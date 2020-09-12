<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\User;
use App\Services\DebtsCreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DebtsController extends Controller
{
    public function create()
    {
        return view('debts.create');
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        DB::beginTransaction();
        $debt = Debt::create([
            'name' => $request->debtName,
            'date' => $request->debtDate,
            'value' => $request->debtValue,
            'user_id' => $userId
        ]);
        DB::commit();

        return redirect('/dashboard');
    }
}
