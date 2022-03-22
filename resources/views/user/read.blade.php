<x-guest-layout>
    <x-slot name="slot">

        {{-- ヘッダー --}}
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

                <x-flash-message status="session('status')" />

            </div>
            <button onclick="location.href='/login'"
                class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base md:mt-0">Button
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </button>
        </header>

        @foreach ($novels as $novel)
            <div class="text-center">
                <div class="bg-white sm:py-12 lg:py-12 py-24 ">
                    <div class="max-w-screen-md px-10 md:px-8 mx-auto">
                        <h1 class="text-gray-800 text-2xl sm:text-3xl font-bold text-center mb-4 md:mb-6">
                            {{ $novel->novel_title }}</h1>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($novel_infos as $novel_info)
            <div class="flex justify-center">
                <div class="container px-1 py-1 mx-auto ">
                    <div class="flex flex-around">
                        <p class="text-gray-900 text-lg mb-6 md:mb-8 py-5 px-14 text-left">

                            {!! nl2br(htmlspecialchars($novel_info->episode)) !!} <a href="#"
                                class="text-indigo-500 hover:text-indigo-600 active:text-indigo-700 underline transition duration-100">random</a>
                            or otherwise generated. It may be used to display a sample of fonts or generate text for
                            testing.
                            Filler text is dummy text which has no meaning however looks very similar to real text.
                        </p>
                    </div>
                </div>
            </div>
        @endforeach


        <div class="flex justify-center">
            <a href="/" button
                class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Top画面へ</button></a>
            <a href="{{ route('user.read', ['novel_id' => $novel->novel_id, 'page' => $page - 1]) }}"><button
                    class="
                ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">前へ</button></a>


            <a href="{{ route('user.read', ['novel_id' => $novel->novel_id, 'page' => $page + 1]) }}"><button
                    class="
                ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">次へ</button></a>
        </div>
    </x-slot>
</x-guest-layout>
