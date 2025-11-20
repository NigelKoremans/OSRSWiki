<x-app-layout>
    @guest
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
        <p>You are not logged in.</p>
        <p>Please <a class="underline" href="{{ route('article.login', [$subject]) }}">log in</a> to edit this article.</p>
    </div>
    @endguest
    <x-title>
        <x-slot:options>
            <a class="text-lg text-neutral-500" href="{{ route('revision.index', [$subject]) }}">History</a>
            <a class="text-lg text-neutral-500" href="{{ route('article.show', [$subject]) }}">Go back</a>
            </x-slot>
            Editing: {{$subject}}</x-title>
    <form action="{{route('article.update', $subject)}}" method="POST">
        @method('PUT')
        @csrf
        @error('content')
        <div class="text-red-500 mb-2">{{$message}}</div>
        @enderror
        <x-article-editor>
            {{ htmlspecialchars_decode($revision->content) }}
        </x-article-editor>
        @auth
        <label class="block mt-4" for="summary">Edit summary</label>
        <input class="block bg-white shadow-sm border border-gray-300" type="text" name="summary" value="{{old('summary')}}">
        <input class="cursor-pointer bg-neutral-500 text-white px-4 py-1 mt-4 text-lg" onclick="submit()" type="submit" value="save">
        @endauth
    </form>
</x-app-layout>
