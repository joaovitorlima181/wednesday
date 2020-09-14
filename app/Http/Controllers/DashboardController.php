<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $debts = Debt::all();
        return view('dashboard.index', compact('debts'));
    }
}
