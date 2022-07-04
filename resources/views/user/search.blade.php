<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            小説投稿サイト
            <x-flash-message status="session('status')" />
        </h2>
        <form method="get" action="{{ route('user.search', ['user_request' => 4]) }}">
            <div class="text-right leading-tight">
                検索
                <input type="text" name="keyword">
            </div>
        </form>
    </x-slot>

    {{-- body --}}
    <x-slot name="slot">
        <div class="flex items-center rounded bg-grey-light w-auto p-2">
            <div class="text-sm mt-2 grid grid-cols-4 divide-x divide-gray-400 ">
                <a href="{{ route('user.search', ['user_request' => 1]) }}">
                    <div
                        class="bg-red-100 p-4 rounded mt-1 border-b-2 border-gray-300 cursor-pointer hover:bg-grey-lighter">
                        運営の<br>
                        おすすめ
                    </div>
                </a>
                <a href="{{ route('user.search', ['user_request' => 2]) }}">
                    <div
                        class="bg-orange-100 p-4  rounded mt-1 border-b-2 border-grey-300 cursor-pointer hover:bg-grey-lighter">
                        評価の<br>
                        高い
                    </div>
                </a>
                <a href="{{ route('user.search', ['user_request' => 3]) }}">
                    <div
                        class="bg-green-100 p-4 rounded mt-1 border-b-2 border-grey-300 cursor-pointer hover:bg-grey-lighter">
                        最新の<br>
                        投稿
                    </div>
                </a>
                <a href="{{ route('user.search', ['user_request' => 0]) }}">
                    <div
                        class="bg-blue-100 p-4 rounded mt-1 border-b-2 border-grey-300 cursor-pointer hover:bg-grey-lighter">
                        ランダム<br>
                        だむ
                    </div>
                </a>
            </div>

        </div>
        <p class="mt-3 text-grey-dark w-auto">【{{ $message_search }}】で検索しています</p>
        @foreach ($novels as $novel)
            <div class="container px-2 py-2 mx-auto items-center">
                <div
                    class="max-w-4xl px-10 my-3 py-3 bg-white rounded-lg shadow-md transition duration-500 ease-in-out hover:bg-green-100 transform hover:-translate-y-1 hover:scale-110">
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
                                {{-- <div class="flex items-center" href="#">
                                <h1 class="text-gray-700 font-bold">名前</h1>
                            </div> --}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
        <div class="px-20 mb-8">
            {{ $novels->links() }}
        </div>
    </x-slot>
</x-guest-layout>
