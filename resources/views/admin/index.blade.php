@extends('layout.app')

@section('content')
    <div class="hero w-full p-20 bg-violet-800 rounded flex justify-center gap-4 items-start flex-col">
        <div class="hero-head">
            <h1 class="text-white text-5xl font-normal">Welcome, Admin!</h1>
        </div>
    </div>

    <div class="w-full h-[35vh] flex justify-center items-center">
        <div class="buttons flex justify-center items-center">
            <div class="hero-button flex gap-4">
                <a class="border px-4 py-2 min-w-[10rem] bg-violet-800 text-white rounded hover:bg-violet-400 text-center transition" href="/users">Users</a>
                <a class="border px-4 py-2 min-w-[10rem] bg-violet-800 text-white rounded hover:bg-violet-400 text-center transition" href="/categories">Categories</a>
                </button>
                <form action="/logout" method="GET">
                    @csrf
                    <button class="border px-4 py-2 min-w-[10rem] bg-violet-800 text-white rounded hover:bg-violet-400 transition" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="table">
        <div class="table-head mb-3">
            <h1 class="text-3xl font-semibold">User database</h1>
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
                            <button class="px-4 py-2 rounded bg-yellow-300 hover:bg-yellow-200 transition" type="submit">Edit</button>
                            <button class="px-4 py-2 rounded bg-red-300 hover:bg-red-200 transition" type="submit">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}
        
@endsection