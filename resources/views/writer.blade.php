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

    {{-- body --}}



    @foreach ($novels as $novel)
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-12 mx-auto ">
                <a href="{{ route('show', ['id' => $novel->novel_id]) }}">
                    <div
                        class="flex flex-around -m-4 h-full border-2 border-blue-700 border-opacity-60 rounded-lg overflow-hidden">
                        <div class="md:w-1/2 p-4 w-full ">
                            <div class="mt-4">
                                <h1 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                                    小説名：{{ $novel->novel_title }}
                                </h1>
                                <h3 class="text-gray-900 title-font text-lg font-medium">
                                    The 400 Blows：{{ $novel->information }}
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
                <div class="p-4 lg:w-1/3">
                    <div
                        class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">下書き
                        </h1>
                        <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing
                            microdosing tousled waistcoat.</p>
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
                <div class="p-4 lg:w-1/3">
                    <div
                        class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">新規投稿</h1>
                        <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing
                            microdosing tousled waistcoat.</p>
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
                <div class="p-4 lg:w-1/3">
                    <div
                        class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">編集
                            Godard</h1>
                        <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing
                            microdosing tousled waistcoat.</p>
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
            </div>
        </div>
    </section>





    <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
        小説投稿画面＜新規＞
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
                                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr
                                    hexagon brooklyn asymmetrical gentrify.</p>
                            </div>

                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="-m-2">
                                    <form method="post" action='user/update'>
                                        @csrf

                                        <div class="p-2 w-1/2">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <input type="text" name="novel_title"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>


                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="message"
                                                    class="leading-7 text-sm text-gray-600">小説概要</label>
                                                <textarea id="message" name="information" value="information"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                            </div>
                                        </div>

                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="message" class="leading-7 text-sm text-gray-600">内容</label>
                                                <textarea id="message" name="sentence" value="sentence"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <button
                                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">投稿する</button>
                                        </div>

                                    </form>

                                    <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                                        <a class="text-indigo-500">example@email.com</a>
                                        <p class="leading-normal my-5">49 Smith St.
                                            <br>Saint Cloud, MN 56301
                                        </p>
                                        <span class="inline-flex">
                                            <a class="text-gray-500">
                                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                    <path
                                                        d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <a href="https://twitter.com/RL_engineer009" class="ml-4 text-gray-500">
                                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                    <path
                                                        d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <a class="ml-4 text-gray-500">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                    viewBox="0 0 24 24">
                                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01">
                                                    </path>
                                                </svg>
                                            </a>
                                            <a class="ml-4 text-gray-500">
                                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                    <path
                                                        d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
