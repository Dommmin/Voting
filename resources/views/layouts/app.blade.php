<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Voting</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans text-gray-900 text-sm bg-gray-background">
        <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
            <a href="{{ route('idea.index') }}"><img src="{{ asset('img/logo.svg') }}" alt="logo"></a>
            <div class="flex items-center mt-2 md:mt-0 ">
                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                            <div class="flex items-center space-x-4">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                                <div x-data="{ isOpen: false }" class="relative">
                                    <button @click="isOpen = !isOpen">
                                        <svg class="h-8 w-8 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                                        </svg>
                                        <div class="absolute rounded-full bg-red text-white text-xxs w-6 h-6 flex justify-center items-center border-2 -top-1 -right-1">
                                            8
                                        </div>
                                    </button>
                                    <ul
                                        x-show.transition.origin.top="isOpen"
                                        x-cloak
                                        @click.away="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                        class="absolute w-76 md:w-96 z-10 bg-white text-left text-sm shadow-dialog rounded-xl max-h-128  overflow-y-auto text-gray-700 -right-28 md:-right-12"
{{--                                        style="right: -46px"--}}
                                    >
                                        <li>
                                            <a
                                                href="#"
                                                @click.prevent="
                                                isOpen = false
                                                $dispatch('custom-show-edit-modal')
                                            "
                                                class="flex hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in"
                                            >
                                                <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a" class="rounded-xl w-10 h-10" alt="avatar">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">drehimself</span>
                                                    </div>
                                                    <div class="line-clamp-6">
                                                        <span class="font-semibold">This is my idea:</span>
                                                        <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis enim impedit laudantium officia porro quaerat reprehenderit. Assumenda culpa hic ipsum laudantium odio quaerat quia quos saepe sapiente temporibus veniam, vero. Aspernatur at, aut beatae corporis debitis deserunt dolor dolorum ducimus est ex facilis inventore, ipsa molestiae numquam odio porro quas quibusdam vel voluptates, voluptatibus? Ab accusamus accusantium aut commodi dolor dolore dolorum error, eum facilis fugiat hic, id iusto, laboriosam libero maxime modi molestiae molestias nesciunt officia perferendis perspiciatis quae quod repellat repellendus saepe voluptas voluptatibus! Accusantium doloremque labore obcaecati. Cupiditate eos nesciunt nobis non, quisquam ratione sunt veniam. Voluptatibus!"</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                @click.prevent="
                                                isOpen = false
                                                $dispatch('custom-show-edit-modal')
                                            "
                                                class="flex hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in"
                                            >
                                                <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a" class="rounded-xl w-10 h-10" alt="avatar">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">drehimself</span>
                                                    </div>
                                                    <div>
                                                        <span class="font-semibold">This is my idea</span>
                                                        <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi cum deleniti est sit. Ab aperiam eos est magni rerum?"</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                @click.prevent="
                                                isOpen = false
                                                $dispatch('custom-show-edit-modal')
                                            "
                                                class="flex hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in"
                                            >
                                                <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a" class="rounded-xl w-10 h-10" alt="avatar">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">drehimself</span>
                                                    </div>
                                                    <div>
                                                        <span class="font-semibold">This is my idea</span>
                                                        <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi cum deleniti est sit. Ab aperiam eos est magni rerum?"</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                @click.prevent="
                                                isOpen = false
                                                $dispatch('custom-show-edit-modal')
                                            "
                                                class="flex hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in"
                                            >
                                                <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a" class="rounded-xl w-10 h-10" alt="avatar">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">drehimself</span>
                                                    </div>
                                                    <div>
                                                        <span class="font-semibold">This is my idea</span>
                                                        <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi cum deleniti est sit. Ab aperiam eos est magni rerum?"</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="border-t border-gray-300 text-center">
                                            <button
                                                class="w-full block font-semibold hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in py-4"
                                            >
                                                Mark all as read
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a href="">
                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>

        <main class="container mx-auto max-w-custom flex flex-col md:flex-row">
            <div class="w-70 mx-auto md:mx-0 md:mr-5">
                <div class="bg-white md:sticky md:top-8 border-2 border-blue rounded-xl mt-16">
                    <div class="text-center px-6 py-2 pt-6">
                        <h3 class="font-semibold text-base">Add an idea</h3>
                        <p class="text-xs mt-4">
                            @auth
                                Let us know what you would like and we'll take a look over!
                            @else
                                Please login to create an idea.
                            @endauth
                        </p>
                    </div>

                    @auth
                        <livewire:create-idea />
                    @else
                        <div class="my-6 text-center">
                            <a
                                href="{{ route('login') }}"
                                class="inline-block justify-center w-1/2 h-10 text-xs bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 text-white"
                            >
                                Login
                            </a>
                            <a
                                href="{{ route('register') }}"
                                class="inline-block justify-center w-1/2 h-10 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-4"
                            >
                                Sign Up
                            </a>
                        </div>
                    @endauth

                </div>
            </div>
            <div class="w-full px-2 md:px-0 md:w-175">
                <livewire:status-filters />

                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>
        </main>

        @if(session('success_message'))
            <x-notification-success
                :redirect="true"
                message-to-display="{{ (session('success_message')) }}"
            />
        @endif

        <livewire:scripts />
    </body>
</html>
