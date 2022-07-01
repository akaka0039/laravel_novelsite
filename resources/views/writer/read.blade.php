<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            エピソード

            <x-flash-message status="session('status')" />
        </h2>
    </x-slot>

    @foreach ($novels as $novel)
        <div class="text-center">
            <div class="bg-white sm:py-6 lg:py-6 py-24 ">
                <div class="max-w-screen-md px-10 md:px-8 mx-auto">
                    <h1 class="text-gray-800 text-2xl sm:text-3xl font-bold text-center mb-4 md:mb-6">
                        {{ $novel->novel_title }}</h1>
                    <h2>
                        {{ $novel_infos->subtitle }}
                    </h2>
                </div>
            </div>
        </div>
        {{-- エピソード --}}
        <div class="flex justify-center">
            <div class="container px-1 py-1 mx-auto ">
                <div class="flex flex-around px-10">
                    <p class="text-gray-900 text-lg mb-6 md:mb-8 py-5 xl:px-32 text-left">
                        {!! nl2br(htmlspecialchars($novel_infos->episode)) !!}
                    </p>
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            {{-- ホーム画面へ --}}
            <a href="/writer/show/{{ $novel_id }}"
                class="inline-flex text-gray-700 bg-indigo-300 border-0 py-2 px-6 mx-2 focus:outline-none hover:bg-indigo-500 rounded text-lg">戻る</button></a>

            {{-- 読書ページへ --}}
            <form method="get"
                action="{{ route('writer.read', ['novel_id' => $novel->novel_id, 'page' => $novel_infos->page]) }}">
                <button type="submit" name="page_read" value="0"
                    class="
        ml-4 inline-flex text-gray-700 bg-gray-300 border-0 py-2 px-6 focus:outline-none mx-2 hover:bg-gray-200 rounded text-lg">前へ</button>
                <button type="submit" name="page_read" value="1"
                    class="
        ml-4 inline-flex text-gray-700 bg-gray-300 border-0 py-2 px-6 focus:outline-none mx-2 hover:bg-gray-200 rounded text-lg">次へ</button>
            </form>
        </div>
    @endforeach


</x-app-layout>
