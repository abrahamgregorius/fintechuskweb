<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();
        
        if(!$user) {
            return view('login');
        }
        
        if($user->role == "admin") {
            $users = User::get();
            return view('admin.index', compact('users'));        
        } elseif($user->role == "shop") {
            $products = Product::get();
            return view('shop.index', compact('products'));
        } elseif($user->role == "bank"){
            $wallets = Wallet::where('status', 'pending')->where('debit', null)->get();
            return view('bank.index', compact('wallets'));
        } elseif($user->role == "student") {
            $userlog = Auth::user();
            $products = Product::get();
            $balances = Wallet::where('user_id', $user->id)->where('status', 'success')->get();
            $credit = 0;
            $debit = 0;

            foreach($balances as $balance) {
                $credit += $balance->credit;
                $debit += $balance->debit;
            }
            $money = $credit-$debit;
            
            return view('student.index', compact('userlog', 'products', 'money'));
        }
    }

    public function login(Request $request) {
        $user = User::where('username', $request->username)->first();
        if(!$user || $request->password != $user->password) {
            return redirect()->back()->with('status', 'Login failed');
        }
        
        Auth::login($user);
        
        return redirect()->back();
    }

    public function logout() {
        Session::flush();
        return redirect()->back();
    }

    public function create() {
        $categories = Category::get();
        return view('admin.create', compact('categories'));
    }

    public function store(Request $request) {
        User::create([
            'username' => $request->username,
            'password' => $request->password,
            'role' => 'student',
        ]);
        return redirect('/users')->with('status', 'User created');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('admin.useredit', compact('user'));
    }

    public function update(Request $request, string $id) {
        $user = User::find($id);
        $user->update($request->all());
        return redirect('/users');
    }

    public function users() {
        $users = User::get();
        return view('admin.user', compact('users'));
    }

    public function destroy($id) {
        User::find($id)->delete();
        return redirect()->back()->with('status', 'Success');
    }
}
