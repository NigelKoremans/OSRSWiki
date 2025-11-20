<x-app-layout>
    @guest
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
        <p>You are not logged in.</p>
        <p>Please <a class="underline" href="{{ route('article.login', [$subject]) }}">log in</a> to edit this article.</p>
    </div>
    @endguest
    <x-title>
        <x-slot:options>
            <a class="text-lg text-neutral-500" href="{{ route('revision.index', [$subject]) }}">Go back</a>
        </x-slot:options>
        Editing: {{$subject}}
    </x-title>

    <x-article-editor>
        {{ htmlspecialchars_decode($revision->content) }}
    </x-article-editor>
</x-app-layout>
