@props([
    'card',
])

<div class="modal fade" id="confirmDeckModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeckModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeckModalLabel">Confirmation to Add Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Please confirm that you would like to add this card to the selected deck.
        <form method="GET" action="/addcard">
            <label for="deckid">Deck ID:</label>
            <input id="deckid" name="deckid" type="text">
            <label for="cardid">Card ID:</label>
            <input name="cardid" type="text" value="{{$card->getId()}}">
            <input type="submit" value="Confirm">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>