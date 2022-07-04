<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            小説投稿サイト
            <x-flash-message status="session('status')" />
        </h2>
    </x-slot>

    <x-slot name="slot">
        @foreach ($novels as $novel)
            <div class="bg-white sm:py-12 lg:py-12 py-12">
                <div class="max-w-full sm:px-10 md:px-8 text-center">
                    <h1 class="text-gray-800 text-2xl sm:text-3xl font-bold mb-4 md:mb-6">
                        {{ $novel->novel_title }}</h1>
                    <h2>
                        {{ $novel_infos->subtitle }}
                    </h2>
                </div>
            </div>
            {{-- エピソード --}}
            {{-- <div class="xl:max-w-full flex justify-center">
                <div class="container py-1 mx-auto items-center">
                    <div class="flex-auto text-left">
                        <p
                            class="text-gray-900 text-lg mb-6 md:mb-8 py-5 xl:px-32 text-left sm:text-sm sm:tracking-tighter  md:text-lg xl:text-lg md:ml-4  xg:text-center max-w-6xl xl:tracking-wide">
                            {!! nl2br(htmlspecialchars($novel_infos->episode)) !!}
                        </p>
                    </div>
                </div>
            </div> --}}

            {{-- エピソード --}}
            <div class="flex justify-center">
                <div class="container px-1 py-1 mx-auto">
                    <div class="flex flex-around px-10">
                        <p
                            class="text-gray-900 text-lg mb-6 md:mb-8 py-5 xl:px-32 text-left sm:text-sm sm:tracking-tighter  md:text-lg xl:text-lg md:ml-4  xg:text-center max-w-6xl xl:tracking-wide">
                            {!! nl2br(htmlspecialchars($novel_infos->episode)) !!}
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                {{-- ホーム画面へ --}}
                <a href="/" button
                    class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Top画面へ</button></a>

                {{-- 読書ページへ --}}
                <form method="get"
                    action="{{ route('user.read', ['novel_id' => $novel->novel_id, 'page' => $novel_infos->page]) }}">
                    <button type="submit" name="page_read" value="0"
                        class="
                ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">前へ</button>
                    <button type="submit" name="page_read" value="1"
                        class="
                ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">次へ</button>
                </form>
            </div>
        @endforeach
    </x-slot>

</x-guest-layout>
