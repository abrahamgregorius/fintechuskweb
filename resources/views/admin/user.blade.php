@extends('layout.app')
@section('content')
    <div class="btn-back flex justify-between mb-4">
        <a class="px-4 py-2 mt-2 bg-violet-600 hover:bg-violet-400 transition text-white rounded" href="/">&larr; Back</a>
        <a class="px-4 py-2 mt-2 bg-violet-600 hover:bg-violet-400 transition text-white rounded" href="/user/create">Create User</a>
    </div>
    <div class="table">
        <div class="table-head mb-3">
            <h1 class="text-3xl font-semibold">User database</h1>
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
                    <th class="p-2 border">Role</th>
                    <th class="p-2 w-[15rem] border">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="border">
                        <td class="p-2 border">{{ $user->id }}</td>
                        <td class="p-2 border">{{ $user->username }}</td>
                        <td class="p-2 border">{{ $user->role }}</td>
                        <td class="p-2 border flex justify-center align-center gap-4">
                            <a class="px-4 py-2 rounded bg-yellow-300 hover:bg-yellow-200 transition" href="/user/{{ $user->id }}">Edit</a>
                            <form action="/user/delete/{{ $user->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-2 rounded bg-red-300 hover:bg-red-200 transition" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection