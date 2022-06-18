<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="mx-auto max-w-3xl px-4 sm:px-6 xl:max-w-5xl xl:px-0">
    <div class="flex h-screen flex-col justify-between">

        <header class="flex items-center justify-between py-10">
            <div>
                <a href="{{ route('home') }}">
                    <div class="flex items-center justify-between">
                        <div class="mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="257.3 273.633 40.8 46.367" width="36.8" height="42.37">
                                <defs>
                                    <linearGradient id="logo_svg__b" gradientUnits="userSpaceOnUse" x1="293.42" y1="278.05" x2="293.42" y2="313.21">
                                        <stop style="stop-color:#67e8f9;stop-opacity:1" offset="0%"></stop>
                                        <stop style="stop-color:#06b6d4;stop-opacity:1" offset="100%"></stop>
                                    </linearGradient>
                                    <linearGradient id="logo_svg__d" gradientUnits="userSpaceOnUse" x1="260.07" y1="313.62" x2="260.98" y2="278.47">
                                        <stop style="stop-color:#67e8f9;stop-opacity:1" offset="0%"></stop>
                                        <stop style="stop-color:#06b6d4;stop-opacity:1" offset="100%"></stop>
                                    </linearGradient>
                                    <path d="m267.69 281.9 6.12 20.57-6.16 5.96-7.34-26.4.05-.05h-.2l5.03-6.57 29.91-.78-4.61 7.02-22.8.25Z" id="logo_svg__a"></path>
                                    <path d="M293.22 310.41h.2l-5.2 6.46-29.92.13 4.79-6.92 22.81.25-5.59-20.71 6.31-5.81 6.66 26.54-.06.06Z" id="logo_svg__c"></path>
                                </defs>
                                <use xlink:href="#logo_svg__a" fill="url(#logo_svg__b)"></use>
                                <use xlink:href="#logo_svg__c" fill="url(#logo_svg__d)"></use>
                            </svg>
                        </div>

                        <div class="hidden h-6 text-2xl font-semibold sm:block">{{ config('app.name', 'Laravel') }}</div>
                    </div>
                </a>
            </div>

            <div class="flex items-center text-base leading-5">
                @guest
                    @if (Route::has('login'))
                        <a class="p-1 font-medium text-gray-900 sm:p-4 dark:text-gray-100" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="p-1 font-medium text-gray-900 sm:p-4 dark:text-gray-100" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a class="p-1 font-medium text-gray-900 sm:p-4 dark:text-gray-100" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>

                    <a class="p-1 font-medium text-gray-900 sm:p-4 dark:text-gray-100" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                @endguest
            </div>
        </header>

        <main class="mb-auto">
            @yield('content')
        </main>

        <footer>
            <div class="flex flex-col items-center mt-16">
                <div class="flex mb-3 space-x-4">
                    <a class="text-sm text-gray-500 transition hover:text-gray-600" target="_blank" rel="noopener noreferrer" href="mailto:zizahmarouane@gmail.com">
                        <span class="sr-only">mail</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-gray-700 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 h-6 w-6">
                            <path d="M2.003 5.884 10 9.882l7.997-3.998A2 2 0 0 0 16 4H4a2 2 0 0 0-1.997 1.884z"></path>
                            <path d="m18 8.118-8 4-8-4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8.118z"></path>
                        </svg>
                    </a>

                    <a class="text-sm text-gray-500 transition hover:text-gray-600" target="_blank" rel="noopener noreferrer" href="https://github.com/MarouaneZizah">
                        <span class="sr-only">github</span>
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-700 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 h-6 w-6">
                            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"></path>
                        </svg>
                    </a>

                    <a class="text-sm text-gray-500 transition hover:text-gray-600" target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/marouanezizah/">
                        <span class="sr-only">linkedin</span>
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-700 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 h-6 w-6">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"></path>
                        </svg>
                    </a>

                    <a class="text-sm text-gray-500 transition hover:text-gray-600" target="_blank" rel="noopener noreferrer" href="https://twitter.com/MarouaneZizah">
                        <span class="sr-only">twitter</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current text-gray-700 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 h-6 w-6">
                            <path d="M23.953 4.57a10 10 0 0 1-2.825.775 4.958 4.958 0 0 0 2.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 0 0-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 0 0-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 0 1-2.228-.616v.06a4.923 4.923 0 0 0 3.946 4.827 4.996 4.996 0 0 1-2.212.085 4.936 4.936 0 0 0 4.604 3.417 9.867 9.867 0 0 1-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 0 0 7.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0 0 24 4.59z"></path>
                        </svg>
                    </a>
                </div>

                <div class="flex mb-2 space-x-2 text-sm text-gray-500 dark:text-gray-400">
                    <div>Marouane Zizah</div>
                    <div> •</div>
                    <div>© 2022</div>
                    <div> •</div>
                    <a href="{{ route('home') }}">Square1 Test</a>
                </div>
            </div>
        </footer>
    </div>
</div>

</body>
</html>
