<x-layout>
    @if(session('message'))
        @if(session('message') == 'User successfully deleted.')
            <p class="alert alert-success">{{session('message')}}</p>
        @else
            <p class="alert alert-danger">{{session('message')}}</p>
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