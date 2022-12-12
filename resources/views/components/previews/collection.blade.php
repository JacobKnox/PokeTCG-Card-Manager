<div class="collection">
    <a href="/collections" class="collectionLink">
        <button class="collectionButton">
            <?php
            $cards = $collection->getCards();
            #dd($cards);
            ?>

            <h2 class="collectionName">{{ $collection->name }}</h2>
            <p>{{ $collection->num_cards }} cards</p>
            <p class="collectionDescription">{{ $collection->description }}</p>
        </button>
    </a>
</div>