@extends('layout.app')

@section('content')

    <div class="header mt-3 flex flex-row align-center justify-between">
        <div class="header-left">
            <h1 class="text-3xl font-semibold">Cart</h1>
            @if (session('status'))
                <small class="bg-slate-300 p-1 rounded">{{ session('status') }}</small>
            @endif
        </div>
        <div class="header-right">  
            <h1 class="text-2xl font-bold">Balance: ${{ $money }}</h1>
        </div>
    </div>

    <div class="table">
        <div class="table-body">
            <table class="w-full border">
                <thead>
                <tr class="border">
                    <th class="p-2 w-[4rem] border">ID</th>
                    <th class="p-2 border">Username</th>
                    <th class="p-2 border">Product</th>
                    <th class="p-2 border">Price</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="border">
                        <td class="p-2 border">{{ $product->id }}</td>
                        <td class="p-2 border">{{ $product->user->username }}</td>
                        <td class="p-2 border">{{ $product->product->name }}</td>
                        <td class="p-2 border">{{ $product->product->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="total w-full flex justify-end gap-4 items-center">
            <h1 class="text-2xl font-bold">Total price: {{ $final_price }}</h1>
        </div>
    </div>

    <script defer>
        setTimeout(() => {
            window.print()
        }, 3000)
    </script>
@endsection