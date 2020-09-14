<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    protected $fillable =['cod', 'name', 'date', 'total_value', 'single_value','creator_id', 'debtor_id'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
