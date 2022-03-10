<x-guest-layout>
    <x-slot name="slot">

        {{-- ヘッダー --}}
        <header class="text-gray-600 body-font">
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                <a class="flex title-font font-medium items-right text-gray-900 mb-4 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2"
                        class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span class="ml-3 text-xl text-yellow-800">Tailblocks</span>
                </a>
                <nav
                    class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
                    <a class="mr-5 hover:text-gray-900">First Link</a>
                    <a class="mr-5 hover:text-gray-900">Second Link</a>
                    <a class="mr-5 hover:text-gray-900">Third Link</a>
                    <a class="mr-5 hover:text-gray-900">Fourth Link</a>
                </nav>
                <button
                    class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0"
                    onclick="location.href='/login'">
                    小説を書く
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </header>


        {{-- @foreach ($novel_infos as $novel_info)
            {{ $novel_info->page }}：
            {{ $novel_info->sentence }}
            <br>
        @endforeach --}}


        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                @foreach ($novels as $novel)
                    <div
                        class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                            {{ $novel->novel_title }}
                        </h1>
                        <p class="mb-8 leading-relaxed">{{ $novel->information }}</p>

                        <div class="flex justify-center">
                            <a href="/writer" button
                                class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button></a>
                            <a href="{{ route('read', ['id' => $novel->novel_id]) }}"><button
                                    class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">読む</button></a>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>
    </x-slot>
</x-guest-layout>
