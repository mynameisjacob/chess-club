@extends('games.layout')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif

<a class="btn btn-primary" href="{{ route('games.create') }}">Create game</a>
<a class="btn btn-info" href="{{ route('members.index') }}">Members</a>
<a class="btn btn-info" href="{{ route('leaderboard') }}">Leaderboard</a>
<br></br>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>White</th>
        <th>Black</th>
        <th>Winner</th>
        <th>N.o. white moves</th>
        <th>N.o. black moves</th>
        <th>Date</th>
        <th width="250px">Action</th>
    </tr>
    @foreach ($games as $game)
    <tr>
        <td>{{ $game->id }}</td>
        <td>{{ $game->white }}</td>
        <td>{{ $game->black }}</td>
        <td>{{ $game->winner }}</td>
        <td>{{ $game->wmoves }}</td>
        <td>{{ $game->bmoves }}</td>
        <td>{{ $game->date }}</td>
        <td>
            <form action="{{ route('games.destroy',$game->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('games.show',$game->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('games.edit',$game->id) }}">Edit</a>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
@endsection