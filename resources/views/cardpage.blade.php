<x-layout id="layout">
    <img src="{{ $card->getImages()->getLarge() }}" alt="">

    <select name="decks" id="decks">
        <option id="deckInstruction" value="instruction" selected disabled>Add to Deck</option>
        @foreach($decks as $deck)
        <option value="{{ $deck->id }}">{{ $deck->name }}</option>
        @endforeach
        <option value="new">New Deck</option>
    </select>

    <select name="collections" id="collections">
      <option id="collectionInstruction" value="instruction" selected disabled>Add to Collection</option>
      @foreach($collections as $collection)
      <option value="{{ $collection->id }}">{{ $collection->name }}</option>
      @endforeach
      <option value="new">New Collection</option>
    </select>
    <p>{{ $card->getName() }}</p>
    <a href="/set/{{$card->getSet()->getId()}}">{{ $card->getSet()->getName() }}</a>

    <x-modals.new type='deck'></x-modals.new>
    <x-modals.confirm :card='$card' type='deck'></x-modals.confirm>

    <x-modals.new type='collection'></x-modals.new>
    <x-modals.confirm :card='$card' type='collection'></x-modals.confirm>
</x-layout>

<script>
  $(document).ready(function(){ //Make script DOM ready
    $('#decks').change(function() { //jQuery Change Function
        var opval = $(this).val(); //Get value from select element
        if(opval=="new"){ //Compare it and if true
          $('#deckModal').modal("show"); //Open Modal
        }
        else{
          $('#deckid').val(opval);
          $('#confirmDeckModal').modal("show");
        }
        $(this).prop("selected", false);
        $('#deckInstruction').prop("selected", true);
    });

    $('#collections').change(function() { //jQuery Change Function
        var opval = $(this).val(); //Get value from select element
        if(opval=="new"){ //Compare it and if true
          $('#collectionModal').modal("show"); //Open Modal
        }
        else{
          $('#collectionid').val(opval);
          $('#confirmCollectionModal').modal("show");
        }
        $(this).prop("selected", false);
        $('#collectionInstruction').prop("selected", true);
    });
  });
</script>