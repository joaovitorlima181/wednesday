<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\User;
use App\Services\DebtsCreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DebtsController extends Controller
{
    public function create()
    {
        return view('debts.create');
    }

    public function store(Request $request, DebtsCreator $debtsCreator)
    {
        $userId = DB::table('users')->select('id')->get();
        $debt = $debtsCreator->createDebt($request->debtName, $request->debtValue, $request->debtDate, $userId);

        return redirect('/dashboard');
    }
}
