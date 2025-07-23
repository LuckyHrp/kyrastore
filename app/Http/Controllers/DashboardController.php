<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $todayTransactions = Transaction::whereDate('created_at', Carbon::today())->get();
        $yesterdayTransactions = Transaction::whereDate('created_at', Carbon::yesterday())->get();
        $thisMonthTransactions = Transaction::whereDate('created_at', '>=', Carbon::now()->subMonth())->get();
        $lastMonthTransactions = Transaction::whereDate('created_at', [Carbon::now()->subMonths(2)->startOfDay(), Carbon::now()->subMonth()->endOfDay()])->get();
        return view('admin.dashboard', compact(['todayTransactions', 'yesterdayTransactions', 'thisMonthTransactions', 'lastMonthTransactions']));
    }
}
