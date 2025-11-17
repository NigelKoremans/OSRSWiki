<x-app-layout>
    <x-title>
        <x-slot:options>
            <a class="text-lg text-neutral-500" href="{{ route('article.show', [$article->subject]) }}">Go back</a>
         </x-slot>
            Editing: {{$article->subject}}</x-title>
    <x-article-editor :subject="$article->subject">
        {{ htmlspecialchars_decode($revision->content) }}
    </x-article-editor>
</x-app-layout>
