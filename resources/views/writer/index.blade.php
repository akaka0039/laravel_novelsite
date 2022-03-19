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

    {{-- body --}}


    @foreach ($novels as $novel)
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-12 mx-auto ">
                <a href="{{ route('writer.show', ['id' => $novel->novel_id]) }}">
                    <div
                        class="flex flex-around -m-4 h-full border-2 border-blue-700 border-opacity-60 rounded-lg overflow-hidden">
                        <div class="md:w-1/2 p-4 w-full ">
                            <div class="mt-4 truncate">
                                <h1 class="text-gray-500 text-font tracking-widest title-font mb-1">
                                    小説名：{{ $novel->novel_title }}
                                </h1>
                                <h3 class="text-gray-900 title-font text-lg font-medium">
                                    あらすじ：{{ $novel->novel_information }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        </section>
    @endforeach

    {{ $novels->links() }}


    <section class="text-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                <a href="{{ route('writer.new.site') }}">
                    <div class="p-4 lg:w-1/3 border-2 border-blue-700 border-opacity-60 rounded-lg">
                        <div
                            class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                            <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">新規投稿</h1>
                            <p class="leading-relaxed mb-3">新しい小説を投稿することができます</p>
                            <a class="text-indigo-500 inline-flex items-center">Learn More
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            <div
                                class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4">
                                <span
                                    class="text-gray-400 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                    <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>1.2K
                                </span>
                                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                    <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                        </path>
                                    </svg>6
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="text-gray-600 body-font relative">
                <div class="container px-5 py-24 mx-auto">
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="-m-2">
                            {{-- ユーザ削除機能 --}}
                            <form method="post" action="{{ route('writer.user.delete') }}">
                                @csrf
                                <div class="p-2 w-full flex justify-around mt-32">
                                    <button type="submit"
                                        class=" text-black bg-red-400 border-0 py-2 px-5 focus:outline-none hover:bg-red-600 rounded">ユーザを削除する</a>
                                        <input type="hidden" name="user_id" value={{ $user_id }}>
                                        <input type="hidden" name="novel_id" value={{ $user_id }}>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
