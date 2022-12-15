<div class="collection">
    <a href="/collections" class="collectionLink">
        <button class="collectionButton">
            <?php
            $cards = $collection->getCards();
            #dd($cards);
            ?>

            <a href="/collection/{{$collection->id}}">
                <h2 class="collectionName">{{ $collection->name }}</h2>
                <p>{{ $collection->num_cards }} cards</p>
                <p class="collectionDescription">{{ $collection->description }}</p>
            </a>
        </button>
    </a>
</div>