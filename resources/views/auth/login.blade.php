<x-app-layout>
    @if(session('status'))
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
        @csrf
        <div>
            <label for="email">E-mail</label>
            <input placeholder="Enter your emailaddress" class="block bg-white shadow-sm border border-gray-300" type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input placeholder="Enter your password" class="block bg-white shadow-sm border border-gray-300" type="password" name="password" id="password">
        </div>
        <input class="bg-neutral-500 text-white px-4 py-1 mt-4 text-lg" type="submit" value="Login">
    </form>
</x-app-layout>
