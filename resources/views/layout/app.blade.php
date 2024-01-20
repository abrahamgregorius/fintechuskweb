<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('gambar.png') }}" type="image/x-icon">
    <title>Fintech USK</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="navbar w-full border-b-2 p-4 flex justify-between items-center">
        <div class="nav-left">
            <a href="/"><h1 class="text-xl">Fintech</h1></a>
        </div>
        <div class="nav-right">
            @if (auth()->user())
                <h1>{{ auth()->user()->username }}</h1>
            @endif
        </div>
    </div>

    <main>
        <div class="container mx-auto my-0 pt-4 min-w-[1024px] gap-4 w-full flex flex-col">
            @yield('content')
        </div>
    </main>
</body>
</html>