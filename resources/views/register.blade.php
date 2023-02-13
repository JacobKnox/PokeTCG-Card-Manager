<x-layout>
    <div class="flex">
        <div id="signup">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 id="signupHeader">Sign Up</h1>
            <form id="signupForm" method="POST" action="register">
                @csrf <!-- {{ csrf_field() }} -->
                <label for="email">Email: </label>
                <input name="email" type="text" value="{{ old('email') }}" placeholder="johndoe@example.com" required>
                <label for="username">Username: </label>
                <input name="username" type="text" value="{{ old('username') }}" placeholder="JohnDoe123" required>
                <label for="password">Password: </label>
                <input name="password" type="password" required>
                <input type="submit" value="Sign Up" id="signupSubmit">
            </form>
        </div>
    </div>
</x-layout>