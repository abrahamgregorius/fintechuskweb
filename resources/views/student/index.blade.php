@extends('layout.app')

@section('content')
    <div class="hero w-full p-20 bg-green-800 rounded flex justify-center gap-4 items-start flex-col">
        <h1 class="text-white text-5xl font-normal">Welcome, {{ $userlog->username }}!</h1>
        <small class="text-white flex items-center gap-1">Balance: <span class="text-xl p-1 bg-green-700 rounded ">${{ $money }}</span></small>
        <div class="hero-button flex flex-row gap-2">
            <a href="/balance/withdraw">
                <button class="px-4 py-2 rounded bg-white hover:bg-slate-200 transition" type="submit">Withdraw</button>
            </a>
            <a href="/balance/add">
                <button class="px-4 py-2 rounded bg-white hover:bg-slate-200 transition" type="submit">Request Balance</button>
            </a>
            <a href="/cart">
                <button class="px-4 py-2 rounded bg-white hover:bg-slate-200 transition" type="submit">Cart</button>
            </a>
            <form action="/logout" method="GET">
                @csrf
                <button class="px-4 py-2 rounded bg-white hover:bg-slate-200 transition" type="submit">Logout</button>
            </form>
        </div>
    </div>

    <div class="product">
        <div class="product-head mb-4 flex justify-between align-center">
            <div class="product-head-left">
                <h1 class="text-3xl font-semibold">Products</h1>
            </div>
            {{-- <div class="product-head-right">
                <a href="/cart">
                    <button class="px-4 py-2 rounded text-white bg-green-800 hover:bg-green-600 transition">
                        Cart
                    </button>
                </a>
            </div> --}}
        </div>
        <div class="product-body grid grid-cols-5 justify-center gap-4">
            @foreach ($products as $product)
                <div class="card p-4 border rounded">
                    <div class="card-image flex justify-center items-center">
                        <img class="object-cover w-full h-[10rem]" src="{{ $product->thumbnail }}" alt="">
                    </div>
                    <div class="card-desc flex flex-col justify-between">
                        <div class="card-desc-title">    
                            <h1 class="text-xl font-semibold">{{ $product->name }}</h1>
                        </div>
                        <div class="card-desc-stock">
                            <small>Stock: {{ $product->stock }}</small>
                        </div>
                        <div class="card-desc-end flex justify-between">
                            <div class="card-desc-end-left">
                                <h2 class="text-2xl text-red-400">${{ $product->price }}</h2>
                            </div>
                            <div class="card-desc-end-right">
                                <form action="/addcart/{{ $product->id }}" method="POST">
                                    @csrf
                                    <button class="p-1 bg-red-300 hover:bg-red-200 rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36"><circle cx="13.33" cy="29.75" r="2.25" fill="red" class="clr-i-outline clr-i-outline-path-1"/><circle cx="27" cy="29.75" r="2.25" fill="red" class="clr-i-outline clr-i-outline-path-2"/><path fill="red" d="M33.08 5.37a1 1 0 0 0-.77-.37H11.49l.65 2H31l-2.67 12h-15L8.76 4.53a1 1 0 0 0-.66-.65L4 2.62a1 1 0 1 0-.59 1.92L7 5.64l4.59 14.5l-1.64 1.34l-.13.13A2.66 2.66 0 0 0 9.74 25A2.75 2.75 0 0 0 12 26h16.69a1 1 0 0 0 0-2H11.84a.67.67 0 0 1-.56-1l2.41-2h15.44a1 1 0 0 0 1-.78l3.17-14a1 1 0 0 0-.22-.85" class="clr-i-outline clr-i-outline-path-3"/><path fill="none" d="M0 0h36v36H0z"/></svg></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="grid">

    </div>


@endsection