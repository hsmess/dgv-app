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
                            <img class="h-45 w-auto" src="https://discgolfvalley.s3.eu-west-2.amazonaws.com/hopsandhyzer/h%26h.png" alt="Workflow" />
                            <p class="mt-2 text-sm leading-5 text-gray-600 max-w">
                                Welcome to Hops and Hyzer.  Website by
                                <a href="https://dontshoot.blog" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                                   Don't Shoot
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
                                                <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                                  <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd"/>
                                                </svg>
                                              </a>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="mt-1 grid grid-cols-3 gap-3">
                                        <div>
                                            <span class="w-full inline-flex rounded-md shadow-sm">
                                              <a href="/google-redirect" type="button" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition duration-150 ease-in-out" aria-label="Sign in with Google">
                                                 <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                                      <g transform="matrix(1, 0, 0, 1, 27.009001, -39.238998)">
                                                        <path fill="#4285F4" d="M -3.264 51.509 C -3.264 50.719 -3.334 49.969 -3.454 49.239 L -14.754 49.239 L -14.754 53.749 L -8.284 53.749 C -8.574 55.229 -9.424 56.479 -10.684 57.329 L -10.684 60.329 L -6.824 60.329 C -4.564 58.239 -3.264 55.159 -3.264 51.509 Z"/>
                                                        <path fill="#34A853" d="M -14.754 63.239 C -11.514 63.239 -8.804 62.159 -6.824 60.329 L -10.684 57.329 C -11.764 58.049 -13.134 58.489 -14.754 58.489 C -17.884 58.489 -20.534 56.379 -21.484 53.529 L -25.464 53.529 L -25.464 56.619 C -23.494 60.539 -19.444 63.239 -14.754 63.239 Z"/>
                                                        <path fill="#FBBC05" d="M -21.484 53.529 C -21.734 52.809 -21.864 52.039 -21.864 51.239 C -21.864 50.439 -21.724 49.669 -21.484 48.949 L -21.484 45.859 L -25.464 45.859 C -26.284 47.479 -26.754 49.299 -26.754 51.239 C -26.754 53.179 -26.284 54.999 -25.464 56.619 L -21.484 53.529 Z"/>
                                                        <path fill="#EA4335" d="M -14.754 43.989 C -12.984 43.989 -11.404 44.599 -10.154 45.789 L -6.734 42.369 C -8.804 40.429 -11.514 39.239 -14.754 39.239 C -19.444 39.239 -23.494 41.939 -25.464 45.859 L -21.484 48.949 C -20.534 46.099 -17.884 43.989 -14.754 43.989 Z"/>
                                                      </g>
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
                    <ul style="font-size: 8px">
                        <li><a href="/privacy">Privacy</a></li>
                        <li><a href="/terms">Terms</a></li>
                    </ul>
                </div>
                <div class="hidden lg:block relative w-0 flex-1">
                    <img class="absolute inset-0 h-full w-full object-cover" src="/img/homepage.png" alt="" />
                </div>
            </div>
        </div>

    </main>
</div>
</body>
</html>



