<x-layout>
    <div class="flex">
        <div id="signup">
            @if(isset($error))
                <p>{{ $error }}</p>
            @endif
            <h1 id="signupHeader">Sign Up</h1>
            <form id="signupForm" method="GET" action="/register">
                @csrf <!-- {{ csrf_field() }} -->
                <label for="email">Email: </label>
                <input name="email" type="text" :value="{{ isset($email) ? $email : '' }}" required>
                <label for="username">Username: </label>
                <input name="username" type="text" :value="{{ isset($username) ? $username : '' }}" required>
                <label for="password">Password: </label>
                <input name="password" type="password" required>
                <input type="submit" value="Sign Up" id="signupSubmit">
            </form>
        </div>
    </div>
</x-layout>