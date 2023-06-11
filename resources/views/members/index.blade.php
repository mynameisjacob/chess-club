@extends('members.layout')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<a class="btn btn-primary" href="{{ route('members.create') }}">Create Member</a>
<a class="btn btn-info" href="{{ route('games.index') }}">Games</a>
<a class="btn btn-info" href="{{ route('leaderboard') }}">Leaderboard</a>
<br></br>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Contact</th>
        <th>Joined</th>
        <th width="250px">Action</th>
    </tr>
    @foreach ($members as $member)
    <tr>
        <td>{{ $member->id }}</td>
        <td>{{ $member->name }}</td>
        <td>{{ $member->email }}</td>
        <td>{{ $member->contact }}</td>
        <td>{{ $member->joined }}</td>
        <td>
            <form action="{{ route('members.destroy',$member->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('members.show',$member->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('members.edit',$member->id) }}">Edit</a>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
@endsection