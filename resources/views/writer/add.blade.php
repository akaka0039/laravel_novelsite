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

    {{-- body --}}



    <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
        小説投稿画面＜追加投稿＞
    </h2>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-col text-center w-full mb-12">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">投稿画面
                                </h1>
                                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">小説を追加投稿</p>
                            </div>

                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="-m-2">
                                    @foreach ($novels as $novel)
                                        <form method="post" action="{{ route('writer.create') }}">
                                            @csrf

                                            <input type="hidden" name="novel_id" value="{{ $novel->novel_id }}">


                                            <div class="p-2 w-1/2">
                                                <div class="relative">
                                                    <label for="name"
                                                        class="leading-7 text-sm text-gray-600">サブタイトル</label>
                                                    <input type="text" name="subtitle"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>

                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="message"
                                                        class="leading-7 text-sm text-gray-600">文章</label>
                                                    <textarea id="message" name="episode" value="episode"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">ここに記述</textarea>
                                                </div>
                                            </div>

                                            <div class="p-2 w-full">
                                                <button
                                                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">追加投稿する</button>
                                            </div>

                                        </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
