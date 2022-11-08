<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home | PokeTCG Card Manager</title>
        <link rel="stylesheet" href="\css\styles.css">
        <script src="\js\index.js"></script>
    </head>
    <body>
        <nav>
            <a href="/" class="nav_link"><button class="nav_button">Home</button></a>
            <a href="/cards/pagesize=50&pagenum=1" class="nav_link"><button class="nav_button">Cards</button></a>
            <a href="/collections" class="nav_link"><button class="nav_button">Collections</button></a>
            <a href="/decks" class="nav_link"><button class="nav_button">Decks</button></a>
            <a href="/registerlogin" class="nav_link"><button class="nav_button">Sign Up / Login</button></a>
        </nav>
        <main id="main">
            {{ $slot }}
        </main>
        <footer id="footer">
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
    </body>
</html>