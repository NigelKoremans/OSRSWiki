<form action="{{route('article.update', $subject)}}" method="POST">
    @method('PUT')
    @csrf
    @error('content')
    <div class="text-red-500 mb-2">{{$message}}</div>
    @enderror
    <div class="bg-white">
        <div class="bg-neutral-500 text-white text-2xl pl-3 py-0.5 select-none flex space-x-3">
            <div class="font-bold">B</div>
            <div class="italic">I</div>
            <div class="underline">U</div>
            <div class="line-through">S</div>
        </div>
        <textarea class="p-1 h-60 w-full resize-none outline-0 font-mono" name="content">{{ $slot }}</textarea>
    </div>
    <label class="block mt-4" for="summary">Edit summary</label>
    <input class="block bg-white shadow-sm border border-gray-300" type="text" name="summary" value="{{old('summary')}}">
    <input class="bg-neutral-500 text-white px-4 py-1 mt-4 text-lg" onclick="submit()" type="submit" value="save">
</form>
