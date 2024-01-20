@extends('layout.app')
@section('content')
    <div class="w-full h-[85vh] flex justify-center items-center">
        <div class="create-card flex flex-col justify-center items-center gap-4 border-2 rounded px-24 py-12">
            <div class="create-head text-center">
                <h1 class="text-3xl mb-1">Edit user</h1>
            </div>
            @if(session('status'))
            <h1 class="px-8 py-2 rounded bg-slate-200 text-white">{{ session('status') }}</h1>
            @endif
            <form action="" method="POST">
                @csrf
                @method('put')
                <div class="create-body flex flex-col gap-1 justify-center">
                    <div class="form-input flex flex-col gap-1">
                        <label for="username">Username</label>
                        <input value="{{ $user->username }}" autocomplete="off" class="bg-slate-100 px-4 py-1 rounded" name="username" id="username" type="text">
                    </div>
                    <div class="form-input flex flex-col gap-1">
                        <label for="password">Password</label>
                        <input value="{{ $user->password }}" autocomplete="off" class="bg-slate-100 px-4 py-1 rounded" name="password" id="password" type="password">
                    </div>
                </div>

                <div class="create-footer mt-6 flex justify-center items-center flex-row gap-4">
                    <a class="py-2 px-8 rounded transition bg-slate-500 text-white hover:bg-slate-300" href="/users">&larr; Back</a>
                    <button class="py-2 px-8 rounded transition bg-violet-600 text-white hover:bg-violet-400">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection