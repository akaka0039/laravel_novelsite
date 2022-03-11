<x-guest-layout>
    <x-slot name="slot">

        {{-- ヘッダー --}}
        <header class="text-gray-600 body-font">
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                <a class="flex title-font font-medium items-right text-gray-900 mb-4 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2"
                        class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span class="ml-3 text-xl text-yellow-800">Tailblocks</span>
                </a>
                <nav
                    class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
                    <a class="mr-5 hover:text-gray-900">First Link</a>
                    <a class="mr-5 hover:text-gray-900">Second Link</a>
                    <a class="mr-5 hover:text-gray-900">Third Link</a>
                    <a class="mr-5 hover:text-gray-900">Fourth Link</a>
                </nav>
                <button
                    class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0"
                    onclick="location.href='/login'">
                    小説を書く
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </header>

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
                                    あらすじ紹介：{{ $novel->information }}
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
                                    {{ $novel_info->sentence }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach

        {{ $novel_infos->links() }}

        <div class="item-right">
            <button onclick="location.href='{{ route('edit', ['id' => $novel->novel_id]) }}'" type="submit"
                class=" text-red-600 bg-green-800 border-0 py-2 px-5 focus:outline-none hover:bg-green-900 rounded">edit</button>
        </div>
        {{-- <input type="hidden" name="novel_id" 　value="{{ $novel->novel_id }}"> --}}
    </x-slot>
</x-guest-layout>
