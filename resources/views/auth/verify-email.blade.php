<x-app-layout>
    Please verify your e-mail address by clicking the link sent to your email.

    <h4>Didn't receive the maiL?</h4>
    @if (session('status') == 'verification-link-sent')

    <div class="mb-4 font-medium text-sm">
        A new email verification link has been emailed to you!
    </div>
    @endif
    <form action="/email/verification-notification" method="POST">
        @csrf
        <input type="submit" value="resend email">
    </form>

</x-app-layout>
