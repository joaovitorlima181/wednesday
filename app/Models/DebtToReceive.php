<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebtToReceive extends Model
{
    use HasFactory;

    protected $table = 'debts_to_receive';
    protected $fillable = ['title', 'date', 'value', 'creator_id'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function debtToPay()
    {
        return $this->hasMany(DebtToPay::class);
    }
}
