<x-app-layout>
    <x-title>Create new article</x-title>
    <form action="{{route('article.store')}}" method="POST">
        @csrf

        <div class="my-5">
            <label class="text-lg" for="Subject">Subject:</label>
            @error('subject')
            <div class="text-red-500 mb-2">{{$message}}</div>
            @enderror
            <input type="text" name="subject" class="block bg-white shadow-sm border border-gray-300">
        </div>
        <label for="content">Content:</label>
        <x-article-editor>

        </x-article-editor>
        <input class="cursor-pointer bg-neutral-500 text-white px-4 py-1 mt-4 text-lg" onclick="submit()" type="submit" value="Create">
    </form>
</x-app-layout>
