<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿小説一覧
            <div class="text-center text-5xl font-extrabold leading-none tracking-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-blue-500">
                    Hello world

                </span>
            </div>
            <x-flash-message status="session('status')" />
        </h2>
    </x-slot>

    @foreach ($novels as $novel)
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-12 mx-auto">
                <div class="flex flex-around -m-4">
                    <div class="md:w-1/2 p-2 w-full">
                        <div class="mt-4">
                            <h1 class="text-gray-900 title-font text-lg font-medium">
                                小説名：{{ $novel->novel_title }}
                            </h1>
                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                                あらすじ紹介：{{ $novel->novel_information }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    @foreach ($novel_infos as $novel_info)
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-5 mx-auto">
                <div class="flex flex-around -m-4">
                    <div class="md:w-1/2 p-4 w-full">
                        <div class="mt-4">
                            <h2 class="text-gray-900 tracking-widest title-font mb-1">
                                {!! nl2br(htmlspecialchars($novel_info->episode)) !!}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <div class="flex justify-center">
        <a href="/writer/index" button
            class="inline-flex text-gray-700 bg-indigo-300 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-500 rounded text-lg">ユーザ画面へ</button></a>
        <a href="/writer/show/{{ $novel_id }}" button
            class="inline-flex text-gray-700 bg-indigo-300 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-500 rounded text-lg">戻る</button></a>

        <a href="{{ route('writer.read', ['novel_id' => $novel->novel_id, 'page' => $page - 1]) }}"><button
                class="
                ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">前へ</button></a>


        <a href="{{ route('writer.read', ['novel_id' => $novel->novel_id, 'page' => $page + 1]) }}"><button
                class="
                ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">次へ</button></a>
    </div>

    <div class="flex justify-center">
        <div class="p-2 w-full flex justify-around mt-32">
            <a href="/writer/index" button
                class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button></a>

        </div>


        {{-- 追加投稿 --}}
        <div class="p-2 w-full flex justify-around mt-32">
            <button
                class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 pd-rigt focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0"
                onclick="location.href='{{ route('writer.add', ['novel_id' => $novel->novel_id]) }}'">
                追加投稿

            </button>
        </div>

        {{-- 編集 --}}
        <div class="p-2 w-full flex justify-around mt-32">
            <form method="get" action="{{ route('writer.edit', ['id' => $novel_id]) }}">
                <div class="item-right">
                    <button type="submit"
                        class=" text-blue-600 bg-gray-300 border-0 py-2 px-5 focus:outline-none hover:bg-green-900 rounded">edit</button>
                </div>
                <input type="hidden" name="novel_id" value="{{ $novel_id }}">
                <input type="hidden" name="page" value="{{ $page }}">
            </form>
        </div>

        {{-- 削除 --}}
        <div class="p-2 w-full flex justify-around mt-32">
            <form method="post" action="{{ route('writer.page.delete') }}">
                @csrf

                @foreach ($novel_infos as $novel_info)
                    <div class="p-2 w-full flex justify-around mt-32">
                        <button type="submit"
                            class=" text-black bg-red-400 border-0 py-2 px-5 focus:outline-none hover:bg-red-600 rounded">Delete</a>
                            <input type="hidden" name="novel_id" value="{{ $novel_info->novel_id }}">
                            <input type="hidden" name="page" value="{{ $novel_info->page }}">
                    </div>
                @endforeach
            </form>
        </div>
    </div>

    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもよろしいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>

</x-app-layout>
