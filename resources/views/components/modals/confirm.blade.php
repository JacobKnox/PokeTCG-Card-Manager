@props([
    'card',
    'type'
])

<div class="modal fade" id="confirm{{ucfirst($type)}}Modal" tabindex="-1" role="dialog" aria-labelledby="confirm{{ucfirst($type)}}ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirm{{ucfirst($type)}}ModalLabel">Confirmation to Add Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Please confirm that you would like to add this card to the selected {{$type}}.
        <form method="GET" action="/addcard/to={{$type}}">
            <label for="{{$type}}id">{{ucfirst($type)}} ID:</label>
            <input id="{{$type}}id" name="{{$type}}id" type="text" required>
            <label for="cardid">Card ID:</label>
            <input name="cardid" type="text" value="{{$card->getId()}}" required>
            <input type="submit" value="Confirm">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>