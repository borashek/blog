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


            <div class="relative bg-white shadow-xl overflow-hidden">
                <div class="max-w-screen-xl mx-auto">
                    <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                        <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <polygon points="50,0 100,0 50,100 0,100" />
                        </svg>
                        <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                            <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start sm:block hidden">
                                <div class="flex flex-row">
                                    <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                                        <a href="{{ route('home') }}" aria-label="Home">
                                            <img class="h-10 w-auto sm:h-14" src="/img/knitting.png" alt="Knitting">
                                        </a>
                                        <a href="{{ route('my-works') }}" class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                                            My works
                                        </a>
                                        <a href="{{ route('your-works') }}" class="ml-6 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                                            Your works
                                        </a>
                                        <a href="{{ route('ins') }}" class="ml-6 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                                            Inspiration
                                        </a>
                                        <x-jet-dropdown align="left" width="48">
                                            <x-slot name="trigger">
                                                <div class="flex flex-row">
                                                    <a href="#" class="ml-6 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                                                        Categories
                                                    </a>
                                                    <a href="#" class="mr-6 mt-1 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0
                                                111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </x-slot>
                                            <x-slot name="content">
                                                <!-- Dropdown items -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Categories of the tutorials') }}
                                                </div>
                                                <livewire:users-cats />
                                            </x-slot>
                                        </x-jet-dropdown>
                                        @if (Route::has('login'))
                                            @auth
                                                <a href="{{ url('/dashboard') }}" class="text-sm ml-6 mb-4 text-gray-700 underline">Dashboard</a>
                                            @else
                                                <a href="{{ route('login') }}" class="text-sm ml-6 mb-4 text-gray-700 underline">Login</a>

                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}" class="ml-4 mb-4 text-sm text-gray-700 underline">Register</a>
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <main class="mt-2 mx-auto max-w-screen-xl px-4 sm:mt-4 md:mt-8 lg:mt-12 xl:mt-20">
                            <div class="sm:text-center lg:text-left">
                                <a href="{{ route('blog') }}" class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                                    Knitting blog
                                </a>
                                <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                    <div class="rounded-md shadow">
                                        <a href="#" class="md:w-full sm:w-60 flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10 ">
                                            Send me your work
                                        </a>
                                    </div>
                                    <div class="mt-3 sm:mt-0 sm:ml-3">
                                        <a href="{{ route('about-me') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-300 transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                            About me
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
                <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="/img/promo_knitting.jpg" alt="Knitting blog">
                </div>
            </div>



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
