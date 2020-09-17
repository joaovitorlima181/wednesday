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
                'title' => $request->debtTitle,
                'date' => $request->debtDate,
                'value'=> $request->debtValue,
                'creator_id' => $userId,
            ]);
            
            for ($i=0; $i < $amountDebtors; $i++) {
                DebtToPay::create([
                    'value' => $debt->value / $amountDebtors,
                    'creator_id' => $userId,
                    'debtor_id'=> $debtsUsersId[$i],
                    'debt_id' => $debt->id,
                ]);
            }

        DB::commit();

        return redirect('/dashboard');
    }

    public function delete(Request $request)
    {

        $debtId = $request->id;

        DB::transaction(function() use ($debtId){
            DebtToPay::where('debt_id', $debtId)->delete();
            DebtToReceive::destroy($debtId);
        });


        return redirect()->back();
    }

    public function edit(int $id, Request $request)
    {
        $newTitle = $request->title;
        $newDate = $request->date;
        $newValue = $request->value;

        $debt = DebtToReceive::find($id);
        $debt->title = $newTitle;
        $debt->date = $newDate;
        $debt->value = $newValue;
        $debt->save();
    }
}
