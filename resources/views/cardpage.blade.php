<x-layout>
    <img src="{{ $card->getImages()->getLarge() }}" alt="">

    <select name="decks" id="decks">
        <option value="instruction" selected disabled>Add to Deck</option>
        @foreach($decks as $deck)
        <option value="{{ $deck->id }}">{{ $deck->name }}</option>
        @endforeach
        <option value="new">New Deck</option>
    </select>
    <p>{{ $card->getName() }}</p>
    <a href="/set/{{$card->getSet()->getId()}}">{{ $card->getSet()->getName() }}</a>

    <x-newdeckmodal></x-newdeckmodal>
    <x-confirmdeckmodal id="confirm" :card="{{ $card }}"></x-confirmdeckmodal>
</x-layout>

<script>
  $(document).ready(function(){ //Make script DOM ready
    $('#decks').change(function() { //jQuery Change Function
        var opval = $(this).val(); //Get value from select element
        if(opval=="new"){ //Compare it and if true
          $('#deckModal').modal("show"); //Open Modal
        }
        else{
          $('#confirm').attr("deckid", opval);
          $('#confirmDeckModal').modal("show");
        }
    });
  });
</script>