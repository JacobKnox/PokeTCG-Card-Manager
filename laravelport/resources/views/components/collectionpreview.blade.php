<div class="collection">
    <a href="/collections" class="collectionLink">
        <button class="collectionButton">
            <?php
            $cards = $collection->cards;
            dd($cards);
            ?>
            @for(int $i = 0; $i < 3; $i++)
            <img src="{{ $cards[$i]->getImages()->getSmall() }}" alt="{{ $cards[$i]->name }}" class="cardPreview">
            @endfor
            <h2 class="collectionName">{{ $collection->name }}</h2>
            <p>{{ $collection->num_cards }} cards</p>
            <p class="collectionDescription">{{ $collection->description }}</p>
        </button>
    </a>
</div>