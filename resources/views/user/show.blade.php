<x-guest-layout>
    <x-slot name="slot">

        {{-- ヘッダー --}}
        <header class="text-gray-600 body-font bg-gray-200 flex">
            <div class="container mx-auto flex flex-wrap py-3 flex-col md:flex-row items-center md:flex-shrink-0">
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


        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-3 py-24 text-left items-center">
                @foreach ($novels as $novel)
                    <div
                        class="lg:flex-grow lg:pr-24 md:pr-16 flex flex-col md:items-start mb-16 md:mb-0 items-center text-center">
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">タイトル:</h2>
                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                            {{ $novel->novel_title }}
                        </h1>
                        <p class="mb-8 leading-relaxed text-left ">{{ $novel->novel_information }}</p>

                        @foreach ($novel_infos as $novel_info)
                            <form method="get"
                                action="{{ route('user.read', ['novel_id' => $novel->novel_id, 'page' => $novel_info->page]) }}">
                                <div class="flex justify-center py-2">
                                    <div class="py-2">
                                        {{ $loop->iteration }}話
                                    </div>
                                    <button type="submit"
                                        class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">{{ $novel_info->subtitle }}</button></a>
                                </div>
                                <input type="hidden" name="page_read" value=2>
                            </form>
                        @endforeach

                        <div class="flex justify-center py-5">
                            <a href="/" button
                                class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button></a>



                            <form method="get"
                                action="{{ route('user.read', ['novel_id' => $novel->novel_id, 'page' => 1]) }}">
                                <button type="submit"
                                    class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">読む</button></a>
                                <input type="hidden" name="page_read" value=2>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
        </section>
    </x-slot>
</x-guest-layout>
