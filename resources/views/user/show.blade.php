<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            小説投稿サイト
            <x-flash-message status="session('status')" />
        </h2>
    </x-slot>

    <x-slot name="slot">
        <section class="text-gray-600 body-font">
            <div class="container mx-auto px-3 py-20">
                @foreach ($novels as $novel)
                    <div
                        class="lg:flex-grow lg:pr-24 md:pr-16 flex flex-col md:items-start mb-16 md:mb-0 sm:text-left sm:items-start truncate">
                        <h1 class="sm:text-4xl text-3xl mb-4 font-medium text-gray-900 truncate text-center">
                            {{ $novel->novel_title }}
                        </h1>
                        <p class="mb-4 leading-relaxed text-center truncate">{{ $novel->novel_information }}</p>

                        <p class="mb-8 pd leading-relaxed text-center">
                            -----------------------------------------------
                        </p>

                        @foreach ($novel_infos as $novel_info)
                            <div class="flex py-2 mx-auto w-full divide-x">
                                <form method="get"
                                    action="{{ route('user.read', ['novel_id' => $novel->novel_id, 'page' => $novel_info->page]) }}">

                                    <div class="text-left">
                                        {{ $loop->iteration }}話：
                                    </div>
                                    <button type="submit"
                                        class="inline-block mr-8 text-gray-700
                                        bg-gray-200 sm:items-center text-center border-0 py-2 px-8 hover:bg-gray-300 rounded
                                         truncate">{{ $novel_info->subtitle }}</button>

                                    <input type="hidden" name="page_read" value=2>
                                </form>
                            </div>
                        @endforeach

                        <div class="flex justify-center py-5">
                            {{-- back to index --}}
                            <a href="/" button
                                class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button></a>
                            {{-- janp to next page --}}
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
