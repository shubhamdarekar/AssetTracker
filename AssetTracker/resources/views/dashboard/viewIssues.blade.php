<?php
    use App\User;
?>
@extends('layouts.app')

@section('content')

<div style="width:inherit;height:inherit;vertical-align:middle;" align="center">
    <h1 style="text-align: center"><strong>User Problems</strong></h1>
    <br><br>
    @foreach($viewIssues as $view)
    <?php
        $username = User::where('id',$view->userId)->get();
    ?>
        <div class="card" style="width:40%">
            <div class="card-header" style="background-color: gray">
                <h3>{{$username[0]['name']}}</h3>
            </div>
            <div class="card-body">
                <form action="/home/viewissues/marksolved" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input class="form-control" type="text" name="asset" value="{{$view->asset}}" readonly style="text-align: center">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="issueFaced" value="{{$view->issueFaced}}" readonly style="text-align:center">
                    </div>
                    <div class="form-group">
                        <div class="col-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" name="submit">Marked as Solved</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <br><br>
        </div>
    @endforeach
</div>
@endsection