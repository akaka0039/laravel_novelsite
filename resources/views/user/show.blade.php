<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            小説投稿サイト
            <x-flash-message status="session('status')" />
        </h2>
    </x-slot>

    <x-slot name="slot">
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
