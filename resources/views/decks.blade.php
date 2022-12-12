<x-layout>
    <div id="decksdisplay">
        @if(count($decks) > 0)
            @foreach($decks as $deck)
                <x-previews.deck :deck="$deck"></x-previews.deck>
            @endforeach
        @else
            <p>You haven't added any decks yet.</p>
        @endif
    </div>
</x-layout>