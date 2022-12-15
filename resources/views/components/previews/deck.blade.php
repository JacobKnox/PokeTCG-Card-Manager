<div class="deck">
    <a href="/decks" class="deckLink">
        <button class="deckButton">
            <?php
            $cards = $deck->getCards();
            #dd($cards);
            ?>
            <a href="/deck/{{$deck->id}}">
                <h2 class="deckName">{{ $deck->name }}</h2>
                <p>{{ $deck->num_cards }} cards</p>
                <p class="deckDescription">{{ $deck->description }}</p>
            </a>
        </button>
    </a>
</div>