<x-guest-layout>
    <x-slot name="slot">
        <header class="text-gray-600 body-font bg-gray-200 flex">
            <div class="container mx-auto flex flex-wrap py-3 flex-col md:flex-row items-center">
                <a class="flex font-medium items-center text-gray-900 mb-4 md:mb-0">
                    <div class="flex-shrink flex items-center">
                        <div class="w-20">
                            <a href="{{ route('user.index') }}">
                                <x-application-logo class="block h-20 w-auto fill-current text-gray-600" />
                            </a>
                        </div>
                    </div>
                    <span class="ml-3 text-4xl">小説投稿サイト</span>
                </a>

                <button onclick="location.href='/login'"
                    class="inline-flex items-end bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">ログイン
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="top-3 w-4 h-4 ml-1" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </header>



        {{-- body --}}


        @foreach ($novels as $novel)
            <section class="text-gray-600 body-font">
                <div class="container px-2 py-8 mx-auto items-center">

                    <a href="{{ route('user.show', ['id' => $novel->novel_id]) }}">

                        <div class="flex flex-around -m-2 bg-yellow-100 border-gray-500 rounded-lg">
                            <div class=" p-4 w-full">
                                <div class="mt-4 truncate">
                                    <h1 class="text-gray-900 title-font text-lg font-top">
                                        小説名：{{ $novel->novel_title }}
                                    </h1>
                                    <div class="md:w-1/2">
                                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                                            あらすじ紹介：{{ $novel->novel_information }}
                                        </h3>
                                    </div>

                                </div>

                            </div>
                            <div class="flex bg-gray-400 px-5">
                                <div class="bottom-0 right-0 h-4 w-4 bg-gray-700">
                                    <p>作成日</p>
                                </div>
                            </div>
                        </div>

                    </a>

                </div>
            </section>
        @endforeach


        {{ $novels->links() }}

        <footer>
            <div class="bg-gray-200">
                <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
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
