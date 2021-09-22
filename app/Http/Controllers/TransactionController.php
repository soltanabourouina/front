<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Exceptions\TransactionIsNotLatestException;

class TransactionController extends Controller
{
    public function transactionsGET()
    {
        $transactions = Transaction::latest()->get();
        return view('browseTransactions', compact('transactions'));
    }
    
    public function cancelTransactionGET($transaction_id)
    {
        try {
            $transaction = Transaction::findOrFail($transaction_id);
            $transaction->delete();
        } catch (TransactionIsNotLatestException $e) {
            return redirect()->back()->withErrors('Vous ne pouvez annuler que la dernière transaction.');
        }

        return redirect()->back()->withSuccess('Transaction annulée avec succès.');
    }
}
