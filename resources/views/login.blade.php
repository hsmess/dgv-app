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
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div>
    <div class="bg-gray-800 pb-32">
        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="border-b border-gray-700">
                    <div class="flex items-center justify-between h-16 px-4 sm:px-0">
                        <div class="flex items-center w-full z-50">

                            @include('flash')
                        </div>

                    </div>
                </div>
            </div>

            <!--
              Mobile menu, toggle classes based on menu state.

              Open: "block", closed: "hidden"
            -->
        </nav>
{{--        <header class="py-10">--}}
{{--            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--                <h1 class="text-3xl leading-9 font-bold text-white">--}}
{{--                    Log In--}}
{{--                </h1>--}}
{{--            </div>--}}
{{--        </header>--}}
    </div>
    <main class="-mt-40 bg-gray-800">
        <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
            <div class="min-h-screen bg-white flex">
                <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
                    <div class="mx-auto w-full max-w-sm">

                        <div>
                            <img class="h-12 w-auto" src="/img/icon.png" alt="Workflow" />
                            <p class="mt-2 text-sm leading-5 text-gray-600 max-w">
                                Welcome to DGV Tournament Dashboard
                                <a href="https://dontshoot.blog" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                                    by Don't Shoot
                                </a>
                            </p>
                            <h2 class="mt-6 text-3xl leading-9 font-extrabold text-gray-900">
                                Sign in to play
                            </h2>
                        </div>

                        <div class="mt-8">
                            <div>
                                <div>
                                    <p class="text-sm leading-5 font-medium text-gray-700">
                                        Sign in with
                                    </p>

                                    <div class="mt-1 grid grid-cols-3 gap-3">
                                        <div>
                                            <span class="w-full inline-flex rounded-md shadow-sm">
                                              <a href="/redirect" type="button" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition duration-150 ease-in-out" aria-label="Sign in with Facebook">
                                                <svg class="h-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                  <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd"/>
                                                </svg>
                                              </a>
                                            </span>
                                        </div>

                                    </div>
                                </div>

{{--                                <div class="mt-6 relative">--}}
{{--                                    <div class="absolute inset-0 flex items-center">--}}
{{--                                        <div class="w-full border-t border-gray-300"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="relative flex justify-center text-sm leading-5">--}}
{{--                                      <span class="px-2 bg-white text-gray-500">--}}
{{--                                        Or continue with--}}
{{--                                      </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>

{{--                            <div class="mt-6">--}}
{{--                                <form action="#" method="POST">--}}
{{--                                    <div>--}}
{{--                                        <label for="email" class="block text-sm font-medium leading-5 text-gray-700">--}}
{{--                                            Email address--}}
{{--                                        </label>--}}
{{--                                        <div class="mt-1 rounded-md shadow-sm">--}}
{{--                                            <input id="email" type="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="mt-6">--}}
{{--                                        <label for="password" class="block text-sm font-medium leading-5 text-gray-700">--}}
{{--                                            Password--}}
{{--                                        </label>--}}
{{--                                        <div class="mt-1 rounded-md shadow-sm">--}}
{{--                                            <input id="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="mt-6 flex items-center justify-between">--}}
{{--                                        <div class="flex items-center">--}}
{{--                                            <input id="remember_me" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />--}}
{{--                                            <label for="remember_me" class="ml-2 block text-sm leading-5 text-gray-900">--}}
{{--                                                Remember me--}}
{{--                                            </label>--}}
{{--                                        </div>--}}

{{--                                        <div class="text-sm leading-5">--}}
{{--                                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">--}}
{{--                                                Forgot your password?--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="mt-6">--}}
{{--                                      <span class="block w-full rounded-md shadow-sm">--}}
{{--                                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">--}}
{{--                                          Sign in--}}
{{--                                        </button>--}}
{{--                                      </span>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block relative w-0 flex-1">
                    <img class="absolute inset-0 h-full w-full object-cover" src="/img/IMG_1306.png" alt="" />
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>



