@props([
    'type'
])

<div class="modal fade" id="{{$type}}Modal" tabindex="-1" role="dialog" aria-labelledby="{{$type}}ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="{{$type}}ModalLabel">New {{ucfirst($type)}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="GET" action="/new{{$type}}">
          @csrf
          <label for="name">Name:</label>
          <input name="name" type="text" required>
          <label for="description">Description:</label>
          <input name="description" type="text" required>
          <input type="submit" value="Create {{ucfirst($type)}}">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>