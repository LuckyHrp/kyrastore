<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transactions = Transaction::with(['user', 'nominal'])->paginate(8);
        return view('admin.transaction.index', compact('transactions'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $transactions = Transaction::with(['user', 'nominal'])
            ->where('trx_id', 'like', '%' . $query . '%')
            ->orWhere('final_price', 'like', '%' . $query . '%')
            ->orWhereHas('user', function ($q) use ($query) {
                $q->where(column: 'name', operator: 'like', value: '%' . $query . '%');
            })
            ->orWhereHas('nominal', function ($q) use ($query) {
                $q->where(column: 'name', operator: 'like', value: '%' . $query . '%');
            })
            ->paginate(8);
        ;

        return view('partials.transaction-table-rows', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transaction.index')->with('success', 'Data transaksi berhasil dihapus');
    }
}
