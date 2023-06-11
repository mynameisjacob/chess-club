<!DOCTYPE html>
<html>
<head>
    <title>Chess Club</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <style>
        table tr:nth-child(2){
            counter-reset: rowNumber;
        }
        table tr {
            counter-increment: rowNumber;
        }
        table tr td:first-child::before {
            content: counter(rowNumber)}
    </style>
</head>
<body>

<div class="container">
    <br>
    <a class="btn btn-info" href="{{ route('games.index') }}">Games</a>
    <a class="btn btn-info" href="{{ route('members.index') }}">Members</a>
    <br></br>
    <table class="table table-bordered">
        <tr>
            <th>Rank</th>
            <th>Name</th>
            <th>Games</th>
            <th>Wins</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($members as $member)
        <tr>
            <td></td>
            <td>{{ $member->name }}</td>
            <td>5</td>
            <td>5</td>
            <td>
                <form action="{{ route('members.destroy',$member->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('members.show',$member->id) }}">Show</a>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</div>

</body>
</html>