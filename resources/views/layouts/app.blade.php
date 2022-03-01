<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <livewire:styles/>
    <livewire:scripts/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @stack('scripts')
</head>
<body class="antialiased font-sans bg-gray-200 overflow-hidden">
<div class="min-h-screen bg-gray-100">
    <div class="min-h-full">
        <header
            class="pb-24 bg-indigo-600"
            x-data="{ open: false, focus: true }"
            @keydown.escape="open = ! open"
        >
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="relative py-5 flex items-center justify-center lg:justify-between">
                    <!-- Logo -->
                    <div class="absolute left-0 flex-shrink-0 lg:static">
                        <a href="#">
                            <span class="sr-only">Workflow</span>
                            <img
                                class="h-8 w-auto"
                                src="https://tailwindui.com/img/logos/workflow-mark-indigo-300.svg"
                                alt="Workflow"
                            />
                        </a>
                    </div>

                    <!-- Right section on desktop -->
                    <div class="hidden lg:ml-4 lg:flex lg:items-center lg:pr-0.5">
                        <button
                            type="button"
                            class="flex-shrink-0 p-1 text-indigo-200 rounded-full hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white"
                        >
                            <span class="sr-only">View notifications</span>
                            <svg
                                class="h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                ></path>
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div
                            x-data="{ open: false }"
                            @keydown.escape.stop="open = false"
                            @click.away="open = false"
                            class="ml-4 relative flex-shrink-0"
                        >
                            <div>
                                <button
                                    type="button"
                                    class="bg-white rounded-full flex text-sm ring-2 ring-white ring-opacity-20 focus:outline-none focus:ring-opacity-100"
                                    id="user-menu-button"
                                    x-ref="button"
                                    @click="open = true"
                                    @keyup.space.prevent="open = ! open"
                                    @keydown.enter.prevent="open = ! open"
                                    aria-expanded="false"
                                    aria-haspopup="true"
                                    x-bind:aria-expanded="open.toString()"
                                >
                                    <span class="sr-only">Open user menu</span>
                                    <img
                                        class="h-8 w-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                        alt=""
                                    />
                                </button>
                            </div>

                            <div
                                x-show="open"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="origin-top-right z-40 absolute -right-2 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                x-ref="menu-items"
                                role="menu"
                                aria-orientation="vertical"
                                aria-labelledby="user-menu-button"
                                tabindex="-1"
                                @keydown.tab="open = false"
                                @keydown.enter.prevent="open = false"
                                @keyup.space.prevent="open = false"
                                style="display: none;"
                            >

                                <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                   role="menuitem" tabindex="-1" id="user-menu-item-0"
                                   @click="open = false; focusButton()">Your Profile</a>

                                <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                   role="menuitem" tabindex="-1" id="user-menu-item-1"
                                   @click="open = false; focusButton()">Settings</a>

                                <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                   role="menuitem" tabindex="-1" id="user-menu-item-2"
                                   @click="open = false; focusButton()">Sign out</a>

                            </div>

                        </div>
                    </div>

                    <!-- Search -->
                    <div class="flex-1 min-w-0 px-12 lg:hidden">
                        <div class="max-w-xs w-full mx-auto">
                            <label for="desktop-search" class="sr-only">Search</label>
                            <div class="relative text-white focus-within:text-gray-600">
                                <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                                    <svg class="h-5 w-5"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input id="desktop-search"
                                       class="block w-full bg-white bg-opacity-20 py-2 pl-10 pr-3 border border-transparent rounded-md leading-5 text-gray-900 placeholder-white focus:outline-none focus:bg-opacity-100 focus:border-transparent focus:placeholder-gray-500 focus:ring-0 sm:text-sm"
                                       placeholder="Search" type="search" name="search">
                            </div>
                        </div>
                    </div>

                    <!-- Menu button -->
                    <div class="absolute right-0 flex-shrink-0 lg:hidden">
                        <!-- Mobile menu button -->
                        <button type="button"
                                class="bg-transparent p-2 rounded-md inline-flex items-center justify-center text-indigo-200 hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white"
                                @click="open = ! open" @mousedown="if (open) $event.preventDefault()" aria-expanded="false"
                                :aria-expanded="open.toString()">
                            <span class="sr-only">Open main menu</span>
                            <svg class="h-6 w-6 block"
                                 :class="{ 'hidden': open, 'block': !(open) }"
                                 xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            <svg class="h-6 w-6 hidden"
                                 :class="{ 'block': open, 'hidden': !(open) }"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="hidden lg:block border-t border-white border-opacity-20 py-5">
                    <div class="grid grid-cols-3 gap-8 items-center">
                        <div class="col-span-2">
                            <nav class="flex space-x-4">

                                <a href="#"
                                   class="text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10"
                                   aria-current="page"
                                >
                                    Home
                                </a>

                                <a href="#"
                                   class="text-indigo-100 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10"
                                >
                                    Profile
                                </a>

                                <a href="#"
                                   class="text-indigo-100 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10"
                                >
                                    Resources
                                </a>

                                <a href="#"
                                   class="text-indigo-100 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10"
                                >
                                    Company Directory
                                </a>

                                <a href="#"
                                   class="text-indigo-100 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10"
                                >
                                    Openings
                                </a>

                            </nav>
                        </div>
                        <div>
                            <div class="max-w-md w-full mx-auto">
                                <label for="mobile-search" class="sr-only">Search</label>
                                <div class="relative text-white focus-within:text-gray-600">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                                        <svg class="h-5 w-5"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input id="mobile-search"
                                           class="block w-full bg-white bg-opacity-20 py-2 pl-10 pr-3 border border-transparent rounded-md leading-5 text-gray-900 placeholder-white focus:outline-none focus:bg-opacity-100 focus:border-transparent focus:placeholder-gray-500 focus:ring-0 sm:text-sm"
                                           placeholder="Search" type="search" name="search">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="lg:hidden">

                <div x-show="open" x-transition:enter="duration-150 ease-out" x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100" x-transition:leave="duration-150 ease-in"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                     class="z-20 fixed inset-0 bg-black bg-opacity-25" @click="open = ! open" aria-hidden="true"
                     style="display: none;"></div>


                <div x-show="open" x-transition:enter="duration-150 ease-out"
                     x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="duration-150 ease-in" x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="z-30 absolute top-0 inset-x-0 max-w-3xl mx-auto w-full p-2 transition transform origin-top"
                     x-ref="panel" @click.away="open = false" style="display: none;">
                    <div
                        class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-200">
                        <div class="pt-3 pb-2">
                            <div class="flex items-center justify-between px-4">
                                <div>
                                    <img class="h-8 w-auto"
                                         src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                                         alt="Workflow">
                                </div>
                                <div class="-mr-2">
                                    <button type="button"
                                            class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                            @click="open = ! open">
                                        <span class="sr-only">Close menu</span>
                                        <svg class="h-6 w-6"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-3 px-2 space-y-1">
                                <a href="#"
                                   class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Home</a>
                                <a href="#"
                                   class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Profile</a>
                                <a href="#"
                                   class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Resources</a>
                                <a href="#"
                                   class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Company
                                    Directory</a>
                                <a href="#"
                                   class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Openings</a>
                            </div>
                        </div>
                        <div class="pt-4 pb-2">
                            <div class="flex items-center px-5">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full"
                                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                         alt="">
                                </div>
                                <div class="ml-3 min-w-0 flex-1">
                                    <div class="text-base font-medium text-gray-800 truncate">Tom Cook</div>
                                    <div class="text-sm font-medium text-gray-500 truncate">tom@example.com</div>
                                </div>
                                <button type="button"
                                        class="ml-auto flex-shrink-0 bg-white p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span class="sr-only">View notifications</span>
                                    <svg class="h-6 w-6"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-3 px-2 space-y-1">

                                <a href="#"
                                   class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Your
                                    Profile</a>

                                <a href="#"
                                   class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Settings</a>

                                <a href="#"
                                   class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Sign
                                    out</a>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </header>
        <main class="-mt-24 pb-8">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <h1 class="sr-only">Page title</h1>
                <!-- Main 3 column grid -->
                <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
                    <!-- Left column -->
                    <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                        {{ $content }}
                    </div>

                    @isset ($sidebar)
                        <!-- Right column -->
                        <div class="grid grid-cols-1 gap-4">
                            {{ $sidebar }}
                        </div>
                    @endif
                </div>
            </div>
        </main>
        <footer>
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
                <div class="border-t border-gray-200 py-8 text-sm text-gray-500 text-center sm:text-left"><span
                        class="block sm:inline">© 2021 Tailwind Labs Inc.</span> <span class="block sm:inline">All rights reserved.</span>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
</html>