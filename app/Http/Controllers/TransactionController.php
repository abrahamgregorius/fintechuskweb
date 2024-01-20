<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\Wallet;

class TransactionController extends Controller
{
    public function addCart(string $id) {
        $product = Product::find($id);
        
        $product->update([
            'stock' => $product->stock-1
        ]);

        Transaction::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('status', 'Success');
    }

    public function cart() {
        $products = Transaction::where('user_id', auth()->user()->id,)->where('status', 'pending')->get();
        $balances = Wallet::where('user_id', auth()->user()->id)->where('status', 'success')->get();
        $credit = 0;
        $debit = 0;
        $total_price = 0;

        foreach($balances as $balance) {
            $credit += $balance->credit;
            $debit += $balance->debit;
        }
        $money = $credit-$debit;

        
        foreach($products as $product) {
            $total_price += $product->product->price;
        }
        
        $final_price = $total_price;
        
        return view('student.cart', compact('products', 'money', 'final_price'));
    }

    public function payCart() {
        $products = Transaction::where('user_id', auth()->user()->id)->where('status', 'pending')->get();
        $balances = Wallet::where('user_id', auth()->user()->id)->where('status', 'success')->get();
        $credit = 0;
        $debit = 0;
        $total_price = 0;

        foreach($balances as $balance) {
            $credit += $balance->credit;
            $debit += $balance->debit;
        }
        $money = $credit-$debit;

        
        foreach($products as $product) {
            $total_price += $product->product->price;
        }
        
        $final_price = $total_price;

        Wallet::create([
            'user_id' => auth()->user()->id,
            'status' => 'success',
            'debit' => $final_price
        ]);

        
        foreach($products as $product) {
            $product->update([
                'status' => 'paid'
            ]);
        }

        return redirect('/')->with('status', 'Success');
    }

    public function invoice() {
        $products = Transaction::where('user_id', auth()->user()->id)->where('status', 'pending')->get();
        $balances = Wallet::where('user_id', auth()->user()->id)->where('status', 'success')->get();
        $credit = 0;
        $debit = 0;
        $total_price = 0;

        foreach($balances as $balance) {
            $credit += $balance->credit;
            $debit += $balance->debit;
        }
        $money = $credit-$debit;

        
        foreach($products as $product) {
            $total_price += $product->product->price;
        }
        
        $final_price = $total_price;
        return view('student.invoice', compact('products', 'final_price', 'money'));
    }

}
