<div class="deck">
    <a href="/decks" class="deckLink">
        <button class="deckButton">
            <?php
            $cards = $deck->cards;
            dd($cards);
            ?>
            @for(int $i = 0; $i < 3; $i++)
            <img src="{{ $cards[$i]->getImages()->getSmall() }}" alt="{{ $cards[$i]->name }}" class="cardPreview">
            @endfor
            <h2 class="deckName">{{ $deck->name }}</h2>
            <p>{{ $deck->num_cards }} cards</p>
            <p class="deckDescription">{{ $deck->description }}</p>
        </button>
    </a>
</div>