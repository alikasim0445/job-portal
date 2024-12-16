<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Job Portal')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    @vite('resources/css/app.css') <!-- Assuming you're using Vite for asset management -->
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success bg-red-900 mx-auto w-[30%] p-3 text-center text-white">
            {{ session('success') }}
        </div>
    @endif
    <div class="flex justify-between">
        <a href="/"><img src="{{ asset('image/job_log.png') }}" alt="Job Logo"></a>
        <ul class="flex gap-8 mx-8 mt-[80px]">
            @auth
                <li>
                    <p>Welcome {{ Auth::user()->name }}</p>
                </li>
                <a href="{{ route('manage') }}"><i class="fa-solid fa-gear"></i>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</button>
                </form>
            @else
                <a href="/users/register" class="flex justify-center align-middle mb-[66px] gap-1">
                    <!-- Register Icon and Link -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 640 512">
                        <path
                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                    </svg> Register
                </a>
                <a href="/users/login" class="flex mb-[67px] gap-1">
                    <!-- Login Icon and Link -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 512 512">
                        <path
                            d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                    </svg> Login
                </a>
            @endauth
        </ul>
    </div>

    <div class="container mt-5 mx-auto">


        @yield('content')

    </div>
</body>

</html>
