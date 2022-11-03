<?php
use App\Models\Deck;
$decks = Deck::all();
?>

<x-layout>
    <div id="decksdisplay">
        @if(count($decks) > 0)
            @foreach($decks as $deck)
                <x-deckpreview :deck="$deck"></x-deckpreview>
            @endforeach
        @else
            <p>You haven't added any decks yet.</p>
        @endif
    </div>
</x-layout>