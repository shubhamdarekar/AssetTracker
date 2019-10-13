@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <div class="container">
        <br><br>
        <h1>Asset Requests</h1>
        @if(count($requests) > 0)
            @foreach($requests as $request)
                <div class="jumbotron">
                    <div class="col-8"> 
                        <?php
                            $name = users::get()->where('id','=',$request);
                            echo($name);
                        ?>
                        <h3>{{$request->name}}</h3>
                        <div class="row">
                            <small>{{$request->quantity}}</small>
                            <small>{{$request->department}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        </form>
    </div>
@endsection 