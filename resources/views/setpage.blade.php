<?php
    use Pokemon\Pokemon;
    $cards = Pokemon::Card()->where(['set.name' => $set->getName()])->all();
?>

<x-layout>
    <img src="{{ $set->getImages()->getSymbol() }}" alt="">
    <p>{{ $set->getName() }}</p>
    <div id="cardsDisplay">
        @foreach($cards as $card)
        <x-card :card='$card'></x-card>
        @endforeach
    </div>
</x-layout>