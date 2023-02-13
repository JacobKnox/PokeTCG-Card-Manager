<x-layout>
    @if(session('message'))
        <p class="alert alert-danger">{{session('message')}}</p>
    @endif
    <form action="/users/{{$user->id}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="Delete User" class="btn btn-danger">
    </form>
</x-layout>