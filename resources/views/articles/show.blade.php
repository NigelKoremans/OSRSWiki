<x-app-layout>
    <x-title>
        <x-slot:options>
            <a class="text-lg text-neutral-500" href="{{ route('revision.index', [$article->subject]) }}">History</a>
            <a class="text-lg text-neutral-500" href="{{ route('article.edit', [$article->subject]) }}">Edit</a>
        </x-slot>
        {{$article->subject}}
    </x-title>
    <x-markdown>
        {!! $latestRevision->content !!}
    </x-markdown>
</x-app-layout>
