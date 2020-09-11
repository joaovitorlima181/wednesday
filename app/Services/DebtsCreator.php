<?php

namespace App\Services;

use App\Models\Debt;
use DateTime;
use Illuminate\Support\Facades\DB;

class DebtsCreator
{
    public function createDebt(string $debtName, float $debtValue, $debtDate, int $userId) : Debt
    {
        DB::beginTransaction();
        $debt = Debt::create([
            'name' => $debtName,
            'date' => $debtDate,
            'value' => $debtValue,
            'user_id' => $userId
        ]);

        DB::commit();
        
        return $debt;
    }
}