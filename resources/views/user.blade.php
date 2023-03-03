<x-layout>
    @if(session('message'))
        <p>{{session('message')}}</p>
    @endif
    <form action="/users/{{$user->id}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="Delete User">
    </form>
</x-layout>