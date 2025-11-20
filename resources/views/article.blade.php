<x-app-layout>
    <x-title>
        <x-slot:options>
            <a class="text-lg text-neutral-500" href="{{ route('revision.index', [$article->subject]) }}">History</a>
            <a class="text-lg text-neutral-500" href="{{ route('article.edit', [$article->subject]) }}">Edit</a>
        </x-slot>
        {{$article->subject}}
    </x-title>
    <div class="whitespace-pre-line">{!! $latestRevision->content !!}</div>
</x-app-layout>
