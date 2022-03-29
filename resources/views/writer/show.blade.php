<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿小説一覧
            <div class="text-center text-5xl font-extrabold leading-none tracking-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-blue-500">
                    Hello world

                </span>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container md:px-5 mx-auto lg:w-3/4 truncate">
                            {{-- @if (session('message')) --}}
                            @foreach ($novels as $novel)
                                <div
                                    class="lg:flex-grow lg:pr-24 md:pr-16 flex flex-col md:items-start mb-16 md:mb-0 items-center text-center">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">タイトル:
                                    </h2>
                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                                        {{ $novel->novel_title }}
                                    </h1>
                                    <p class="mb-8 leading-relaxed text-left ">{{ $novel->novel_information }}</p>
                                </div>
                            @endforeach

                            <x-flash-message status="session('status')" />
                            @foreach ($novels as $novel)
                                <div class="flex justify-end mb-4">
                                    <button
                                        onclick="location.href='{{ route('writer.add', ['novel_id' => $novel->novel_id]) }}'"
                                        class=" text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
                                        追加投稿</button>
                                </div>
                            @endforeach

                            <div class="flex w-full mx-auto overflow-auto">
                                <table class="table-fixed w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                サブタイトル</th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                            </th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                            </th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                            </th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($novels as $novel)
                                            @foreach ($novel_infos as $novel_info)
                                                <tr>
                                                    <td class="md:px-4 py-3 truncate hover:text-blue-500"><a
                                                            href="{{ route('writer.read', ['novel_id' => $novel->novel_id, 'page' => $novel_info->page]) }}">
                                                            {{ $novel_infos->firstItem() + $loop->iteration - 1 }} :
                                                            {{ $novel_info->subtitle }}</a></td>
                                                    <td class="md:px-4 py-3 truncate"> <a
                                                            href="{{ route('writer.read', ['novel_id' => $novel->novel_id, 'page' => $novel_info->page]) }}">{{ $novel_info->episode }}</a>
                                                    </td>

                                                    <td class="md:px-4 py-3">
                                                    </td>


                                                    <td class="md:px-4 py-3">
                                                        <form method="get"
                                                            action="{{ route('writer.edit', ['id' => $novel->novel_id]) }}">
                                                            <button type="submit"
                                                                class="text-white bg-green-400 border-0 py-2 px-5 text-center focus:outline-none hover:bg-green-600 rounded">
                                                                edit</button>
                                                            <input type="hidden" name="novel_id"
                                                                value="{{ $novel->novel_id }}">
                                                            <input type="hidden" name="page"
                                                                value="{{ $novel_info->page }}">
                                                        </form>
                                                    </td>

                                                    <td class="md:px-4 py-3">
                                                        <form method="post"
                                                            action="{{ route('writer.page.delete', ['novel_id' => $novel->novel_id]) }}">
                                                            @csrf
                                                            <input type="hidden" name="page"
                                                                value="{{ $novel_info->page }}">

                                                            <button type="submit" onclick="deletePost(this)"
                                                                class=" text-white bg-red-400 border-0 py-2 px-5 focus:outline-none hover:bg-red-600 rounded">Delete</button>
                                                    </td>
                                                    </form>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>


                            </div>
                            {{ $novel_infos->links() }}
                        </div>

                    </section>


                </div>
                <div class="flex justify-center py-5">
                    <a href="/writer/index" button
                        class="inline-flex text-gray-700 bg-indigo-300 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-500 rounded">戻る</button></a>
                </div>
            </div>
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
