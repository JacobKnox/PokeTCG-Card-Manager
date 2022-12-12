<x-layout>
    <div id="collectionsdisplay">
        @if(count($collections) > 0)
            @foreach($collections as $collection)
                <x-collectionpreview :collection="$collection"></x-collectionpreview>
            @endforeach
        @else
            <p>You haven't added any collections yet.</p>
        @endif
    </div>
</x-layout>