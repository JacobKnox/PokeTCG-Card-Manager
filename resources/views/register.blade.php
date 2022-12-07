<x-layout>
    <div class="flex">
        <div id="signup">
            <h1 id="signupHeader">Sign Up</h1>
            <form id="signupForm" method="GET" target="/register">
                <label for="email">Email: </label>
                <input name="email" type="text" required>
                <label for="username">Username: </label>
                <input name="username" type="text" required>
                <label for="password">Password: </label>
                <input name="password" type="password" required>
                <input type="submit" value="Sign Up" id="signupSubmit">
            </form>
        </div>
    </div>
</x-layout>