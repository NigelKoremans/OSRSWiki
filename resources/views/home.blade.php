<x-app-layout>
    <div class="px-20 mt-5">
        <h1 class="text-4xl font-semibold">Welcome to unofficial OSRS Wiki!</h1>
        <div class="flex justify-between mt-5 mb-10">
            <a href="{{ route('test') }}"><img class="h-80 w-80" src="{{ asset('img/placeholder.png') }}"></a>
            <a href="{{ route('test') }}"><img class="h-80 w-80" src="{{ asset('img/placeholder.png') }}"></a>
            <a href="{{ route('test') }}"><img class="h-80 w-80" src="{{ asset('img/placeholder.png') }}"></a>
        </div>
        <div class="border border-gray-900 bg-zinc-300 p-5 pb-4">
            <h2 class="text-3xl mb-2">Popular pages</h2>
            <div class="grid grid-rows-2 grid-cols-3">
                @foreach ($popularArticles as $article)
                <a class="bg-gray-200 mt-4 mx-4 p-5 text-center text-xl" href="/wiki/{{$article->subject}}">
                    {{$article->subject}}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
