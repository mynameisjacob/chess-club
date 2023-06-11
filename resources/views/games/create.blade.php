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

@if ($message = Session::get('danger'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif

<form action="{{ route('games.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>White:</strong>
                <input class="form-control" name="white" placeholder="White:"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Black:</strong>
                <input class="form-control" name="black" placeholder="Black:"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Winner:</strong>
                <input class="form-control" name="winner" placeholder="Winner:"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>N.o. white moves:</strong>
                <input class="form-control" name="wmoves" placeholder="N.o. white moves:"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>N.o. black moves:</strong>
                <input class="form-control" name="bmoves" placeholder="N.o. black moves:"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                <input type="date" class="form-control" name="date" data-date="" data-date-format="DD MMMM YYYY" value= {{$today}} placeholder="Date:"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection