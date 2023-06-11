@extends('games.layout')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('games.update', $game->id) }}" method="POST">
    @csrf
    @method('PUT')

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>White:</strong>
                <input class="form-control" name="white" placeholder="White:" value="{{$game->white}}"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Black:</strong>
                <input class="form-control" name="black" placeholder="Black:" value="{{$game->black}}"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Winner:</strong>
                <input class="form-control" name="winner" placeholder="Winner:" value="{{$game->winner}}"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>N.o. white moves:</strong>
                <input class="form-control" name="wmoves" placeholder="N.o. white moves:" value={{$game->wmoves}}></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>N.o. black moves:</strong>
                <input class="form-control" name="bmoves" placeholder="N.o. black moves:" value={{$game->bmoves}}></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                <input type="date" class="form-control" name="date" data-date="" data-date-format="DD MMMM YYYY" value="{{$game->date}}" placeholder="Date:"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection