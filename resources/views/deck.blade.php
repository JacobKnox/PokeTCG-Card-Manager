<x-layout>
    <h2>{{$deck->name}}</h2>
    <p>{{$deck->description}}</p>
    @foreach($deck->getCards() as $card)
        <x-card :card='$card'></x-card>
    @endforeach
</x-layout>