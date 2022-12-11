<?php
# example code for getting a set
use Pokemon\Pokemon;
Pokemon::Options(['verify' => true]);
Pokemon::ApiKey(env("POKEMON_API_KEY"));
$set = Pokemon::Set()->find('base1');
$cards = Pokemon::Card()->page($num)->pageSize($size)->all();
$count = 0;
?>

<x-layout>
    <div id="filterBar">
        <form>
            <select name="set" id="set" multiple>
                <option value="holder" disabled>Set(s)</option>
                <option value="swsh1">Sword & Shield</option>
            </select>
            <select name="types" id="types" multiple>
                <option value="holder" disabled>Type(s)</option>
                <option value="Normal">Normal</option>
                <option value="Fire">Fire</option>
                <option value="Water">Water</option>
                <option value="Grass">Grass</option>
                <option value="Electric">Electric</option>
                <option value="Ice">Ice</option>
                <option value="Fighting">Fighting</option>
                <option value="Poison">Poison</option>
                <option value="Ground">Ground</option>
                <option value="Flying">Flying</option>
                <option value="Psychic">Psychic</option>
                <option value="Bug">Bug</option>
                <option value="Rock">Rock</option>
                <option value="Ghost">Ghost</option>
                <option value="Dark">Dark</option>
                <option value="Dragon">Dragon</option>
                <option value="Steel">Steel</option>
                <option value="Fairy">Fairy</option>
            </select>
            <select name="supertype" id="supertype" multiple>
                <option value="holder" disabled>Super Type(s)</option>
                <option value="Pokémon">Pokémon</option>
                <option value="Energy">Energy</option>
                <option value="Trainer">Trainer</option>
            </select>
            <label for="name" class="filterName">Name: </label>
            <input type="text" name="name" id="name" class="filterName">
        </form>
    </div>
    <div class="container text-center" id="cardsDisplay">
        @foreach($cards as $card)
            @if($count % 4 == 0)
                <div class="row">
            @elseif($count % 4 == 3)
                </div>
            @endif
            <div class="col"><x-card :card='$card'></x-card></div>
            <?php $count++; ?>
        @endforeach
        @if($num > 1)
            <a href="/cards/pagesize={{ $size }}&pagenum={{ $num - 1 }}"><button>Back</button></a>
        @endif
        @if($num < 15314/$size)
            <a href="/cards/pagesize={{ $size }}&pagenum={{ $num + 1 }}"><button>Forward</button></a>
        @endif
    </div>
</x-layout>