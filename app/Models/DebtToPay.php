<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebtToPay extends Model
{
    use HasFactory;

    protected $table = 'debts_to_pay';
    protected $fillable = ['value', 'debtor_id', 'debt_id', 'creator_id'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function debtToReceive()
    {
        return $this->belongsTo(DebtToReceive::class);
    }
}
