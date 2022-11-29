<x-layout>
    <img src="{{ $card->getImages()->getLarge() }}" alt="">
    <select name="membership" id="membership">
        <option value="instruction" selected disabled>Add to Deck</option>
        <option value="new">New Deck</option>
    </select>
    <p>{{ $card->getName() }}</p>
    <a href="/set/{{$card->getSet()->getId()}}">{{ $card->getSet()->getName() }}</a>
    @dd($card)
</x-layout>