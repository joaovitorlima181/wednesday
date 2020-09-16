<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\DebtToPay;
use App\Models\DebtToReceive;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $debtsToReceive = DebtToReceive::where('creator_id', $userId)->get();

        // $debtsToPay = DebtToPay::where('debtor_id', $userId)->get();
        $debtsToPay= DB::table('debts_to_pay')
            ->where('debtor_id', $userId)
            ->join('debts_to_receive', 'debts_to_pay.debt_id', '=' , 'debts_to_receive.id')
            ->join('users', 'debts_to_pay.creator_id', '=', 'users.id')
            ->select('debts_to_pay.*', 'debts_to_receive.title', 'users.name')
            ->get();

        return view('dashboard.index', compact('debtsToReceive', 'debtsToPay'));
    }
}
