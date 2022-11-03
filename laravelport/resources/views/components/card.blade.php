@props([
    'card'
])

<a href="/card/{{ $card->getId() }}">
    <div class="card">
        <img src="{{ $card->getImages()->getSmall() }}" alt="{{ $card->getName() }}">
    </div>
</a>
