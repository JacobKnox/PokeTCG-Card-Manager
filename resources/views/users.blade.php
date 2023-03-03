<x-layout>
    @if(session('message'))
        @if(session('message') == 'User successfully deleted.')
            <p>{{session('message')}}</p>
        @else
            <p>{{session('message')}}</p>
        @endif
    @endif
    @foreach($users as $user)
        <a href="users/{{$user->id}}">
            <div>
                <p>{{$user->username}}</p>
            </div>
        </a>
    @endforeach
</x-layout>