<?php

namespace App\Services;

use App\Models\DebtToReceive;
use Illuminate\Support\Facades\DB;

class DebtCreator
{
    public function debtToReceiveCreator(string $name, string $date, float $value, int $userId) : DebtToReceive
    {
        DB::beginTransaction();
        $debtToReceive = DebtToReceive::create([
            'name' => $name,
            'date' => $date,
            'total-value' => $value,
            'creator_id' => $userId
        ]);
    }
}