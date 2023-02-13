<x-layout>
    <div id="login">
        @if(isset($error))
        <p>{{ $error }}</p>
        @endif
        <h1 id="loginHeader">Login</h1>
        <form class="form-inline my-2 my-lg-0" id="loginForm" method="POST" action="login">
            @csrf <!-- {{ csrf_field() }} -->
            <label for="username">Username: </label>
            <input name="username" type="text" value="{{ old('username') }}">
            <label for="password">Password: </label>
            <input name="password" type="password">
            <input type="submit" value="Login" id="loginSubmit">
        </form>
    </div>
</x-layout>