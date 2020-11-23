<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Knitting Blog</title>
        <link rel="shortcut icon" href="/img/knitting.png" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <main>
            <livewire:users-nav />
            <div class="bg-indigo-50 p-10">
                <div>
                    <main>
                        <div class="flex md:flex-row flex-wrap">
                            <div class="w-full md:w-1/5 text-center">
                                <h2 class="text-indigo-800 font-bold mb-6">
                                    Categories<br>of the tutorials:
                                </h2>
                                <div class="border mb-4"></div>
                                <livewire:users-cats />
                                <div class="border"></div>
                                <a href="{{ route('my-works') }}" class="block px-3 mt-2 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">
                                    My works
                                </a>
                                <a href="{{ route('your-works') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">
                                    Your works
                                </a>
                                <a href="{{ route('ins') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">
                                    Inspiration
                                </a>
                                <div class="border mb-4"></div>
                                @if (Route::has('login'))
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="font-medium text-indigo-600 hover:text-indigo-900 transition duration-150 ease-in-out">
                                            Dashboard
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-900 transition duration-150 ease-in-out">
                                            Login
                                        </a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-8 font-medium text-indigo-600 hover:text-indigo-900 transition duration-150 ease-in-out">
                                                Register
                                            </a>
                                        @endif
                                    @endif
                                @endif
                            </div>
                            <div class="w-full md:w-3/5 text-center">
                                <h4 class="text-2xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-lg sm:leading-none md:text-lg">
                                    You will find your inspiration here..)
                                </h4>
                                <livewire:users-search-post />
                                {{ $slot }}
                            </div>
                            <div class="w-full md:w-1/5">
                                <livewire:users-adv />
                            </div>
                        </div>
                    </main>
                </div>
            </div>
            @include('includes.footer')
        </main>
        @stack('modals')
    </body>
</html>
