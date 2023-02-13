@php
    use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home | PokeTCG Card Manager</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="\css\styles.css">
        <script src="\js\index.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg m-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav mr-auto">  
                    <a href="/" class="nav-item nav-link"><button class="nav_button">Home</button></a>
                    <a href="/cards/pagesize=50&pagenum=1" class="nav-item nav-link"><button class="nav_button">Cards</button></a>
                    @if(Auth::check())
                        <a href="/collections" class="nav-item nav-link"><button class="nav_button">Collections</button></a>
                        <a href="/decks" class="nav-item nav-link"><button class="nav_button">Decks</button></a>
                        <p class="nav-item">Welcome, {{ Auth::user()->username }}!</p>
                        <a href="/logout" class="nav-item nav-link"><button class="nav_button">Logout</button></a>
                    @else
                    <a href="/register" class="nav-item nav-link"><button class="nav_button">Sign Up</button></a>
                </div>
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
                @endif
            </div> 
        </nav>
        <main class="m-0" id="main">
            {{ $slot }}
        </main>
        <footer class="m-0" id="footer">
            <p>PokeTCG Card Manager by Jacob Knox</p>
            <p>All data made available by the <a href="https://pokemontcg.io/">Pokémon TCG API</a></p>
            <p>This website is not produced, endorsed, or supported by, nor affiliated with, Nintendo, The Pokémon Company, Game Freak, and all other related affiliates.</p>
        </footer>
        <script>
            const main = document.getElementsByTagName("main")[0];
            const footer = document.getElementsByTagName("footer")[0];
            const nav = document.getElementsByTagName("nav")[0];
            const body = document.getElementsByTagName("body")[0];
            function setMainHeight(){
                main.style.minHeight = (body.offsetHeight - footer.offsetHeight - nav.offsetHeight - 75) + "px";
            }
            setMainHeight();
            addEventListener('resize', (event) => setMainHeight());
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>