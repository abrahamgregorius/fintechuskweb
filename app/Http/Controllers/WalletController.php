<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function create() {
        return view('student.addbalance');
    }

    public function add_balance(Request $request){
        Wallet::create([
            'credit' => $request->credit,
            'user_id' => auth()->user()->id,
            'status' => 'pending'
        ]);
        return redirect('/');
    }

    public function all() {
        $wallets = Wallet::get();
        return view('bank.all', compact('wallets'));
    }

    public function approve($id) {
        $wallet = Wallet::find($id);
        $wallet->update([
            'status' => 'success'
        ]);
        return redirect()->back()->with('status', 'Success');
    }

    public function add() {
        $users = User::where('role', 'student')->get();
        return view('bank.add', compact('users'));
    }

    public function add_post(Request $request) {
        Wallet::create([
            'user_id' => $request->user_id,
            'credit' => $request->credit,
            'status' => 'success'
        ]);
        return redirect('/')->with('status', 'Success');
    }

    public function withdraw() {
        $balances = Wallet::where('user_id', auth()->user()->id)->where('status', 'success')->get();
        $credit = 0;
        $debit = 0;
        $total_price = 0;

        foreach($balances as $balance) {
            $credit += $balance->credit;
            $debit += $balance->debit;
        }
        $money = $credit-$debit;

        return view('student.withdraw', compact('money'));
    }

    public function withdraw_post(Request $request) {
        Wallet::create([
            'user_id' => auth()->user()->id,
            'debit' => $request->debit,
            'status' => 'success'
        ]);

        return redirect('/')->with('status', 'Success');
    }
}
