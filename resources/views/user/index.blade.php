<x-guest-layout>
    <x-slot name="slot">

        <div class="shadow-md">
            <nav class="font-sans bg-white text-center flex justify-between mb-4 mx-auto container overflow-hidden ">
                <div class="w-20">
                    <a href="{{ route('user.index') }}">
                        <x-application-logo class="block h-20 w-auto fill-current text-gray-600" />
                    </a>
                </div>
                <ul class="text-sm text-gray-700 list-none p-0 flex items-center">
                    <li><a href="#"
                            class="inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline">Products</a>
                    </li>
                    <li><a href="#"
                            class="inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline">Pricing</a>
                    </li>
                    <li class="pr-2"><a href="#"
                            class="inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline">FAQs</a></li>
                    <li class="pl-2 border-l"><a href="#"
                            class="inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline">Log In</a>
                    </li>
                    <button class="bg-black hover:bg-text-gray-800 text-white ml-4 py-2 px-3">
                        Sign Up
                    </button>
                </ul>
            </nav>
        </div>



        {{-- <button onclick="location.href='/login'"
                class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base md:mt-0">Button
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </button> --}}




        {{-- body --}}
        @foreach ($novels as $novel)
            <div class="container px-2 py-2 mx-auto items-center">

                <div class="max-w-4xl px-10 my-3 py-3 bg-gray-100 rounded-lg shadow-md">
                    <a href="{{ route('user.show', ['id' => $novel->novel_id]) }}">
                        <div class="flex justify-between items-center">
                            {{-- <span
                                class="font-light text-gray-600">日付</span> --}}
                            {{-- <div class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500"
                            href="#">Design</a> --}}
                        </div>
                        <div class="truncate">
                            <div class="text-2xl text-gray-700 font-bold hover:text-gray-600">
                                {{ $novel->novel_title }}
                            </div>
                            <p class="mt-2 text-gray-600 truncate">{{ $novel->novel_information }}</p>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <div class="text-blue-600 hover:underline">Read more</div>
                            <div>
                                <div class="flex items-center" href="#">
                                    <h1 class="text-gray-700 font-bold">Khatab wedaa</h1>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        @endforeach

        <div class="px-5 mb-8">
            {{ $novels->links() }}
        </div>

        <footer>
            <div class="bg-gray-200 py-2">
                <div class="container mx-auto py-2 px-5 flex flex-wrap flex-col sm:flex-row">
                    <p class="text-gray-500 text-sm text-center sm:text-left">© 2022 - Haru-GrobalEngineer —

                    </p>
                    <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">

                        <a href="https://twitter.com/RL_engineer009" class="ml-3 text-gray-500">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                            </svg>
                        </a>
                    </span>
                </div>
            </div>
        </footer>

    </x-slot>
</x-guest-layout>
