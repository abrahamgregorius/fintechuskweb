@extends('layout.app')

@section('content')
    <div class="hero w-full p-20 bg-yellow-400 rounded flex justify-center gap-4 items-start flex-col">
        <h1 class="text-black text-5xl font-normal">Welcome, Bank!</h1>
    
        <div class="hero-button flex flex-row gap-2">
            <form action="/logout" method="GET">
                @csrf
                <button class="px-4 py-2 rounded bg-white hover:bg-slate-200 transition" type="submit">Logout</button>
            </form>
    </div>
    </div>

    <div class="header mt-3 flex flex-row align-center justify-between">
        <div class="header-left">
            <h1 class="text-3xl font-semibold">Top-up requested</h1>
            @if (session('status'))
                <small class="bg-slate-300 p-1 rounded">{{ session('status') }}</small>
            @endif
        </div>
        <div class="header-right">  
            <a class="px-4 py-2 rounded bg-yellow-300 hover:bg-yellow-200 transition" href="/balances">All Wallet</a>
            <a class="px-4 py-2 mt-2 bg-yellow-300 hover:bg-yellow-200 transition rounded" href="/balance/create">Add balance</a>
        </div>
    </div>

    <div class="table">
        <div class="table-body">
            <table class="w-full border">
                <thead>
                <tr class="border">
                    <th class="p-2 w-[4rem] border">ID</th>
                    <th class="p-2 border">Username</th>
                    <th class="p-2 border">Requested Balance</th>
                    <th class="p-2 w-[15rem] border">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($wallets as $wallet)
                    <tr class="border">
                        <td class="p-2 border">{{ $wallet->id }}</td>
                        <td class="p-2 border">{{ $wallet->user->username }}</td>
                        <td class="p-2 border">${{ $wallet->credit }}</td>
                        <td class="p-2 flex justify-center align-center gap-4">
                            <form action="/balance/{{ $wallet->id }}/approve" method="POST">
                                @csrf
                                <button class="px-4 py-2 rounded bg-yellow-300 hover:bg-yellow-200 transition" type="submit">Approve</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection