<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿小説編集
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
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-col text-center w-full mb-12">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">投稿画面
                                </h1>
                                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">小説を編集</p>
                            </div>

                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="-m-2">
                                    <form method="post" action="{{ route('writer.update') }}">

                                        @foreach ($novels as $novel)
                                            @csrf
                                            <input type="hidden" name="novel_id" value="{{ $novel->novel_id }}">
                                            <div class="p-2 w-1/2">
                                                <div class="relative">
                                                    <label for="name"
                                                        class="leading-7 text-sm text-gray-600">小説名</label>
                                                    <input type="text" name="novel_title"
                                                        value="{{ $novel->novel_title }}"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>

                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="message"
                                                        class="leading-7 text-sm text-gray-600">小説概要</label>
                                                    <textarea id="message" name="novel_information"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-y leading-6 transition-colors duration-200 ease-in-out">{{ $novel->novel_information }}</textarea>
                                                </div>
                                            </div>

                                            @foreach ($novel_infos as $novel_info)
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <label for="message"
                                                            class="leading-7 text-sm text-gray-600">内容</label>
                                                        <textarea id="message" name="episode"
                                                            class="w-full h-64 transition duration-100 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3  leading-6 resize-y ease-in-out">{{ $novel_info->episode }}</textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="page" value="{{ $novel_info->page }}">
                                            @endforeach

                                            <div class="flex justify-center px-5">
                                                <a href="/writer/show/{{ $novel->novel_id }}" button
                                                    class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button></a>
                                                <button
                                                    class="ml-8 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集する</button>
                                            </div>
                                        @endforeach
                                    </form>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
