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


    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            @foreach ($novels as $novel)
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                        {{ $novel->novel_title }}
                    </h1>
                    <p class="mb-8 leading-relaxed">{{ $novel->novel_information }}</p>

                    @foreach ($novel_infos as $novel_info)
                        <div class="flex justify-center">
                            {{ $loop->iteration }}
                            <a
                                href="{{ route('writer.read', ['novel_id' => $novel->novel_id, 'page' => $loop->iteration]) }}"><button
                                    class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">{{ $novel_info->subtitle }}</button></a>

                            <div class="flex items-">



                                {{-- 編集 --}}

                                <form method="get" action="{{ route('writer.edit', ['id' => $novel->novel_id]) }}">

                                    <button type="submit"
                                        class=" text-blue-600 bg-gray-300 border-0 py-2 px-5 focus:outline-none hover:bg-green-900 rounded">edit</button>

                                    <input type="hidden" name="novel_id" value="{{ $novel->novel_id }}">
                                    <input type="hidden" name="page" value="{{ $novel_info->page }}">
                                </form>


                                {{-- 削除 --}}

                                <form method="post" action="{{ route('writer.page.delete') }}">
                                    @csrf



                                    <button type="submit"
                                        class=" text-black bg-red-400 border-0 py-2 px-5 focus:outline-none hover:bg-red-600 rounded">Delete</a>
                                        <input type="hidden" name="novel_id" value="{{ $novel_info->novel_id }}">
                                        <input type="hidden" name="page" value="{{ $novel_info->page }}">


                                </form>
                            </div>
                        </div>
                    @endforeach

                    <div class="flex justify-center">
                        <a href="/writer/index" button
                            class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button></a>
                        <a
                            href="{{ route('writer.read', ['novel_id' => $novel->novel_id, 'page' => $loop->iteration]) }}"><button
                                class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">読む</button></a>

                        <form method="post" action="{{ route('writer.novel.delete') }}">
                            @csrf
                            <input type="hidden" name="novel_id" value="{{ $novel->novel_id }}">
                            <button type="submit"
                                class="ml-4 inline-flex text-red-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">削除する</button></a>
                        </form>
                        <button
                            class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 pd-rigt focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0"
                            onclick="location.href='{{ route('writer.add', ['novel_id' => $novel->novel_id]) }}'">
                            追加投稿

                        </button>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

</x-app-layout>
