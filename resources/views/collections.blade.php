<x-layout>
    <div id="collectionsdisplay">
        @if(count($collections) > 0)
            @foreach($collections as $collection)
                <x-previews.collection :collection="$collection"></x-previews.collection>
            @endforeach
        @else
            <p>You haven't added any collections yet.</p>
        @endif
    </div>
</x-layout>