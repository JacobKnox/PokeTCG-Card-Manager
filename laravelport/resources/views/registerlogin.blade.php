<x-layout>
    <div class="flex">
        <div id="login">
            <h1 id="loginHeader">Login</h1>
            <form id="loginForm">
                <label for="username">Username: </label>
                <input name="username" type="text">
                <label for="password">Password: </label>
                <input type="password">
                <input type="submit" value="Login" id="loginSubmit">
            </form>
        </div>
        <div id="signup">
            <h1 id="signupHeader">Sign Up</h1>
            <form id="signupForm">
                <label for="username">Username: </label>
                <input name="username" type="text">
                <label for="password">Password: </label>
                <input type="password">
                <input type="submit" value="Sign Up" id="signupSubmit">
            </form>
        </div>
    </div>
</x-layout>