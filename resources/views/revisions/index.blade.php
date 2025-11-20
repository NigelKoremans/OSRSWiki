<x-app-layout>
    <x-title>
        {{$subject}}: Revision history
        <x-slot:options>
            <a class="text-lg text-neutral-500" href="{{ route('article.show', [$subject]) }}">Go back</a>
            </x-slot>
    </x-title>
    @foreach ($revisions as $revision)
    <div class="flex">
        <p class="mr-3">{{ \carbon\Carbon::parse($revision->edited_at)->format('H:i, j F')}}
        <p>
        <p class="mr-3">{{$revision->editor->name}}
        <p>
        <p class="italic mr-5">"{{$revision->summary}}"</p>
        <a class="text-blue-800" href="{{ route('revision.show', [$subject, $revision->id])}}">View</a>
        @auth

        @if(Auth::user()->role == 'admin')
        <form class="ml-5" action="{{ route('revision.destroy', [$subject, $revision->id])}}" method="POST">
            @csrf
            @method('delete')
            <button class="cursor-pointer text-red-800">Delete</button>
        </form>
        @endif
        @endauth
    </div>
    @endforeach
</x-app-layout>
