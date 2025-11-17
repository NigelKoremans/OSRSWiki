<x-app-layout>
    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Username</label>
            <input placeholder="Enter your Username" class="block bg-white shadow-sm border border-gray-300" type="text" name="name" id="name">
        </div>
        <div>
            <label for="email">E-mail</label>
            <input placeholder="Enter your email address" class="block bg-white shadow-sm border border-gray-300" type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input placeholder="Enter a password" class="block bg-white shadow-sm border border-gray-300" type="password" name="password" id="password">
        </div>
        <div>
            <label for="password_confirmation">Confirm password</label>
            <input placeholder="Enter password again" class="block bg-white shadow-sm border border-gray-300" type="password" name="password_confirmation" id="password_confirmation">
        </div>
        <input class="bg-neutral-500 text-white px-4 py-1 mt-4 text-lg" type="submit" value="Register">
    </form>
</x-app-layout>
