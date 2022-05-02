<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            小説投稿サイト
            <x-flash-message status="session('status')" />
        </h2>
    </x-slot>



    {{-- body --}}
    <x-slot name="slot">
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

        <footer>
            <div class="bg-gray-200 py-2">
                <div class="container mx-auto py-2 px-5 flex flex-wrap flex-col sm:flex-row">
                    <p class="text-gray-500 text-sm text-center sm:text-left">© 2022 - Haru-GrobalEngineer —

                    </p>
                    <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">

                        <a href="https://twitter.com/RL_engineer009" class="ml-3 text-gray-500">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                            </svg>
                        </a>
                    </span>
                </div>
            </div>
        </footer>

    </x-slot>
</x-guest-layout>
