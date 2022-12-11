<div class="deck">
    <a href="/decks" class="deckLink">
        <button class="deckButton">
            <?php
            $deck->setCards(['pl1-3']);
            $cards = $deck->getCards();
            #dd($cards);
            ?>
            
            <h2 class="deckName">{{ $deck->name }}</h2>
            <p>{{ $deck->num_cards }} cards</p>
            <p class="deckDescription">{{ $deck->description }}</p>
        </button>
    </a>
</div>