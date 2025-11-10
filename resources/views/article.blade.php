<x-app-layout>
    <x-title>{{$article->subject}}</x-title>
    <div>
        {{$latestRevision->content}}
    </div>
</x-app-layout>
