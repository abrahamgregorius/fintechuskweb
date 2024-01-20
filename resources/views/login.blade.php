@extends('layout.app')

@section('content')

<div class="login flex w-full h-[80vh] flex-col justify-center items-center">
    <div class="login-card flex flex-col justify-center items-center gap-4 border-2 rounded px-24 py-12">
        <div class="login-head">
            <h1 class="text-3xl">Login</h1>
        </div>
        @if(session('status'))
        <h1 class="px-8 py-2 rounded bg-red-400 text-white">{{ session('status') }}</h1>
        @endif
        <form action="" method="POST">
            @csrf
            <div class="login-body flex flex-col gap-1 justify-center">
                <div class="form-input flex flex-col">
                    <label for="username">Username</label>
                    <input autocomplete="off" class="bg-slate-100 px-4 py-1 rounded" name="username" id="username" type="text">
                </div>
                <div class="form-input flex flex-col">
                    <label for="password">Password</label>
                    <input autocomplete="off" class="bg-slate-100 px-4 py-1 rounded" name="password" id="password" type="password">
                </div>
            </div>

            <div class="login-footer mt-4 flex justify-center items-center">
                <button class="py-2 px-8 rounded transition bg-slate-300 hover:bg-slate-400">Login</button>
            </div>
        </div>
    </form>
</div>

@endsection