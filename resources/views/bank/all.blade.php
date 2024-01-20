@extends('layout.app')
@section('content')
    <div class="btn-back flex justify-between mb-4">
        <a class="px-4 py-2 mt-2 bg-yellow-400 hover:bg-yellow-300 transition rounded" href="/">&larr; Back</a>
    </div>
    <div class="table">
        <div class="table-head mb-3">
            <h1 class="text-3xl font-semibold">All Wallets</h1>
            @if (session('status'))
                <small class="bg-slate-300 p-1 rounded">{{ session('status') }}</small>
            @endif
        </div>
        <div class="table-body">
            <table class="w-full border">
                <thead>
                <tr class="border">
                    <th class="p-2 w-[4rem] border">No.</th>
                    <th class="p-2 border">Username</th>
                    <th class="p-2 border">Debit</th>
                    <th class="p-2 border">Credit</th>
                    <th class="p-2 w-[15rem] border">Status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($wallets as $wallet)
                    <tr class="border">
                        <td class="p-2 border">{{ $wallet->id }}</td>
                        <td class="p-2 border">{{ $wallet->user->username }}</td>
                        @if ($wallet->debit == 0)
                            <td class="p-2 text-center border">-</td>
                        @else                    
                            <td class="p-2 border">{{ $wallet->debit }}</td>
                        @endif
                        @if ($wallet->credit == 0)
                            <td class="p-2 text-center border">-</td>
                        @else                    
                            <td class="p-2 border">{{ $wallet->credit }}</td>
                        @endif
                        <td class="p-2 flex justify-center">
                            @if($wallet->status == 'success')
                            <span class="p-1 min-w-[7rem] text-center bg-green-400 rounded">
                                {{ $wallet->status }}
                            </span>
                            @else
                            <span class="p-1 min-w-[7rem] text-center bg-slate-300 rounded">
                                {{ $wallet->status }}
                            </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection