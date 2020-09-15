<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\DebtToPay;
use App\Models\DebtToReceive;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Psy\bin;

class DebtsController extends Controller
{
    public function create()
    {
        $users = User::all();
        return view('debts.create', compact('users'));
    }

    public function store(Request $request)
    {

        $userId = Auth::id();

        $debtsUsersId = $request->debtUsers;
        $amountDebtors = sizeof($debtsUsersId);

        DB::beginTransaction();
       
            $debt = DebtToReceive::create([
                'name' => $request->debtName,
                'date' => $request->debtDate,
                'value'=> $request->debtValue,
                'creator_id' => $userId,
            ]);
            
            for ($i=0; $i < $amountDebtors; $i++) {
                DebtToPay::create([
                    'value' => $debt->value / $amountDebtors,
                    'debtor_id'=> $debtsUsersId[$i],
                    'debt_id' => $debt->id,
                ]);
            }

        DB::commit();

        return redirect('/dashboard');
    }
}
