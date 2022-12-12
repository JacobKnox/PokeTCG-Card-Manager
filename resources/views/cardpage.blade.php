<x-layout>
    <img src="{{ $card->getImages()->getLarge() }}" alt="">

    <select name="decks" id="decks">
        <option value="instruction" selected disabled>Add to Deck</option>
        <option value="new">New Deck</option>
    </select>
    <p>{{ $card->getName() }}</p>
    <a href="/set/{{$card->getSet()->getId()}}">{{ $card->getSet()->getName() }}</a>

<!-- Modal -->
<div class="modal fade" id="deckModal" tabindex="-1" role="dialog" aria-labelledby="deckModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deckModalLabel">New Deck</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          @csrf
          <label for="name">Name:</label>
          <input name="name" type="text" required>
          <label for="description">Description:</label>
          <input name="description" type="text" required>
          <input type="submit" value="Create Deck">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</x-layout>

<script>
  $(document).ready(function(){ //Make script DOM ready
    $('#decks').change(function() { //jQuery Change Function
        var opval = $(this).val(); //Get value from select element
        if(opval=="new"){ //Compare it and if true
            $('#deckModal').modal("show"); //Open Modal
        }
    });
  });
</script>