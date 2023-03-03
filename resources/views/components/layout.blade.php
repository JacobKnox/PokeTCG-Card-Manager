@php
    use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home | PokeTCG Card Manager</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
        <link rel="stylesheet" href="\css\styles.css">
        <script src="\js\index.js"></script>
    </head>
    <body>
        <nav class="navbar is-fixed-top is-info is-spaced" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarContent">
                  <span aria-hidden="true"></span>
                  <span aria-hidden="true"></span>
                  @if(Auth::check())
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                  @endif
                </a>
            </div>

            <div class="navbar-menu" id="navbarContent">
                <div class="navbar-start">
                    <a class="navbar-item" href="/">Home</a>
                    <a class="navbar-item" href="/cards/pagesize=50&pagenum=1">Cards</a>

                    @if(Auth::check())
                        <a class="navbar-item" href="/collections">Collections</a>
                        <a class="navbar-item" href="/decks">Decks</a>
                    @endif
                </div>
              
                <div class="navbar-end">
                    @if(Auth::check())
                        <p class="navbar-item">Welcome, {{ Auth::user()->username }}!</p>
                        <a class="button is-danger" href="/logout">Logout</a>
                    @else
                        <div class="navbar-item">
                            <div class="buttons">
                                <a class="button is-primary" href="/register">
                                    <strong>Sign up</strong>
                                </a>
                                <a class="button is-dark" href="/login">
                                    Log in
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div> 
        </nav>

        <main class="mt-6" id="main">
            {{ $slot }}
        </main>

        <footer class="footer" id="footer">
            <div class="content has-text-centered">
                <p>PokeTCG Card Manager by Jacob Knox</p>
                <p>All data made available by the <a href="https://pokemontcg.io/">Pokémon TCG API</a></p>
                <p>This website is not produced, endorsed, or supported by, nor affiliated with, Nintendo, The Pokémon Company, Game Freak, and all other related affiliates.</p>
            </div>
        </footer>

        <script>
            

            document.addEventListener('DOMContentLoaded', () => {
                // Get all "navbar-burger" elements
                const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
                // Add a click event on each of them
                $navbarBurgers.forEach( el => {
                    el.addEventListener('click', () => {
                        // Get the target from the "data-target" attribute
                        const target = el.dataset.target;
                        const $target = document.getElementById(target);
                        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                        el.classList.toggle('is-active');
                        $target.classList.toggle('is-active');
                    });
                });
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    </body>
</html>