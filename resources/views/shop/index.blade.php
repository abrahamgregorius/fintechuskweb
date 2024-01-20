@extends('layout.app')

@section('content')
    <div class="hero w-full p-20 bg-sky-800 rounded flex justify-center gap-4 items-start flex-col">
        <h1 class="text-white text-5xl font-normal">Welcome, Shop!</h1>
        <div class="hero-button">
            <form action="/logout" method="GET">
                @csrf
                <button class="px-4 py-2 rounded bg-white hover:bg-slate-200 transition" type="submit">Logout</button>
            </form>
        </div>
    </div>

    <div class="header mt-3 flex flex-row align-center justify-between">
        <div class="header-left">
            <h1 class="text-3xl font-semibold">Shop database</h1>
            @if (session('status'))
                <small class="bg-slate-300 p-1 rounded">{{ session('status') }}</small>
            @endif
        </div>
        <div class="header-right">  
            <a class="px-4 py-2 mt-2 bg-sky-800 hover:bg-sky-600 transition text-white rounded" href="/product/create">Create Product</a>
        </div>
    </div>

    <div class="table mb-14">
        <table class="w-full border rounded">
            <thead>
                <tr class="border">
                    <th class="p-2 bg-slate-600 text-white w-[4rem] border">No.</th>
                    <th class="p-2 bg-slate-600 text-white w-[15rem] border">Picture</th>
                    <th class="p-2 bg-slate-600 text-white border">Product name</th>
                    <th class="p-2 bg-slate-600 text-white border">Category</th>
                    <th class="p-2 bg-slate-600 text-white border">Stock</th>
                    <th class="p-2 bg-slate-600 text-white border">Price</th>
                    <th class="p-2 bg-slate-600 text-white w-[10rem] border">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="border">
                    <td class="p-2 border">{{ $product->id }}</td>
                    <td class="p-2 border flex justify-center items-center"><img class="h-[10rem]" src="{{ $product->thumbnail }}" alt=""></td>
                    <td class="p-2 border text-center">{{ $product->name }}</td>
                    <td class="p-2 border text-center">{{ $product->category->name }}</td>
                    <td class="p-2 border text-center">{{ $product->stock }}</td>
                    <td class="p-2 border text-center">{{ $product->price }}</td>
                    <td class="p-2">
                        <div class="btn-edit">
                            <a class="" href="/product/{{ $product->id }}">
                                <button class="px-4 py-2 min-w-[10rem] text-center rounded bg-yellow-300 hover:bg-yellow-200 transition">
                                    Edit
                                </button>
                            </a>
                        </div>
                        <div class="btn-delete mt-2">
                            <form action="/product/{{ $product->id }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <button class="px-4 py-2 min-w-[10rem] rounded bg-red-300 hover:bg-red-200 transition" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection