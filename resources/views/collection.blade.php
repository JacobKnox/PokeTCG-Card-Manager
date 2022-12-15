<x-layout>
    <h2>{{$collection->name}}</h2>
    <p>{{$collection->description}}</p>
    @foreach($collection->getCards() as $card)
        <x-card :card='$card'></x-card>
    @endforeach
</x-layout>