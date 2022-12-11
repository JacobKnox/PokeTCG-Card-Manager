<x-layout>
    <div id="welcome_banner">
        <h1 id="banner_header">Welcome to PokéTCG Card Manager!</h1>
    </div>
    <div id="about_site">
        <h2>About the Site</h2>
        <p>PokéTCG Card Manager is a website designed with the average Pokémon Trading Card Game (TCG) enthustiast and collector in mind. It provides searchable, up-to-date information about cards and sets provided by the <a href="https://pokemontcg.io/">Pokémon TCG API</a>, the ability to create and manage collections and decks, and other helpful to be determined features.</p>
        <h3>How do I use the site?</h3>
        <p>TEMP TEXT: Insert brief information about each feature (section will be updated and flushed out upon feature development), how to create and manage an account, etc. Link to a dedicated FAQ page??</p>
    </div>
    <div id="development">
        <h2>Site Development</h2>
        <h3>The Developer</h3>
        <p>Hello, my name is Jacob Knox, and I created PokéTCG Card Manager for a couple of reasons. First, I am an enthusiast of collecting Pokémon cards myself and have always been interested in developing a website and/or app for this purpose (inspired by the multitude that already exist). Second, this essentially serves as my capstone project for my web development concentration at Florida Southern College.</p>
        <p>TEMP TEXT: Insert some more information about myself and possible a photo. Link to social medias and LinkedIn?</p>
        <h3>Tracking Development</h3>
        <p>The current version of this site is: Alpha v. 0.0.2.</p>
        <h4><i>Alpha Versions</i></h4>
        <p>Alpha releases of this website are essentially draft versions of the website that are nowhere near completion. They are not meant for public viewing, but rather for development purposes and progress tracking.</p>
        <h4><i>Version 0.0.2</i></h4>
        <p>Alpha version 0.0.2 saw all of the content in Alpha version 0.0.1 successfully ported to a new Laravel project. The PokemonTCG.io PHP SDK has been imported to begin work on further features.</p>
        <p>Full Changelog: <a href="https://github.com/JacobKnox/PokeTCG-Card-Manager/commits/v0.0.2-alpha">here</a>.</p>
        <p>You can track past and current development of the site on GitHub <a href="https://github.com/JacobKnox/PokeTCG-Card-Manager">here</a>.</p>
    </div>
    @if(isset($session_expired))
    <script>alert("You have been redirected to the home page, because your credentials expired. Please log back in.");</script>
    @endif
</x-layout>