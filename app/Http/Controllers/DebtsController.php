<?php

namespace App\Http\Controllers;

use App\Models\Debt;
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
        $generateCod = random_bytes('3');
        $cod = strval(bin2hex($generateCod));

        $userId = Auth::id();

        $debtsUsersId = $request->debtUsers;
        $amountDebtors = sizeof($debtsUsersId);
        

        DB::beginTransaction();
        for ($i=0; $i < $amountDebtors; $i++) { 
            Debt::create([
                'name' => $request->debtName,
                'date' => $request->debtDate,
                'total_value'=> $request->debtValue,
                'single_value' => $request->debtValue / $amountDebtors,
                'creator_id' => $userId,
                'debtor_id' => $debtsUsersId[$i],
                'cod' => $cod
            ]);
        }

        DB::commit();

        return redirect('/dashboard');
    }
}
