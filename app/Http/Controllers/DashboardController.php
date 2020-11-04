<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\DebtToPay;
use App\Models\DebtToReceive;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $debtsToReceive = DebtToReceive::join('users', 'debts_to_pay.debtor_id', '=', 'users.id')
            ->select('debts_to_receive.*', 'users.name')
            ->where('creator_id', '=', $userId)
            ->get();

            dd($debtsToReceive);

        // $debtsToReceive = DebtToReceive::where('creator_id', $userId)->get();

        $debtsToPay = DebtToPay::join('debts_to_receive', 'debts_to_pay.debt_id', '=' , 'debts_to_receive.id')
        ->join('users', 'debts_to_pay.creator_id', '=', 'users.id')
        ->select('debts_to_pay.*', 'debts_to_receive.title','debts_to_receive.date', 'users.name')
        ->where([
            ['debtor_id', '=' ,$userId],
            ['debts_to_pay.creator_id', '!=' , $userId]
            ])
        ->get();


        return view('dashboard.index', compact('debtsToReceive', 'debtsToPay', 'userId'));
    }
}
