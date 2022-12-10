<x-layout>
    <img src="{{ $card->getImages()->getLarge() }}" alt="">
    <form action="">
        
    </form>
    <select name="membership" id="membership">
        <option value="instruction" selected disabled>Add to Deck</option>
        <button type="button" data-toggle="modal" data-target="#exampleModal"><option value="new">New Deck</option></button>
    </select>
    <p>{{ $card->getName() }}</p>
    <a href="/set/{{$card->getSet()->getId()}}">{{ $card->getSet()->getName() }}</a>

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</x-layout>