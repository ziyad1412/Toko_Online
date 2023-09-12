<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    public function index()
    {
        $transaction = TransactionDetail::getAllTransaction();

        return view('admin.transaction.index', compact('transaction'));
    }
}
