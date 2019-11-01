<?php
    use App\User;
?>
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{asset('css/app/css')}}">
    <div style="width:inherit;height:inherit;vertical-align:middle;" align="center">
            <h1 style="text-align: center"><strong>New Asset Requests</strong></h1>
            <br><br>
            @foreach($newassetrequests as $new)
                <?php 
                    $user = User::where('id',$new->userId)->get();
                    // echo $user;
                ?>
                <div class="card" style="width:40%">
                    <div class="card-header" style="background-color: gray">
                        <h3>{{$user[0]['name']}}</h3>
                    </div>
                    <div class="card-body">
                            <form action="/home/newassetrequests/approve" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input class="form-control" type="text" name="asset" value="{{$new->assetOrdered}}" readonly style="text-align: center">
                                </div>
                                <div class="form-group">
                                        <input type="text" class="form-control" name="quantity" value="{{$new->quantity}}" readonly style="text-align:center">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="reason" value="{{$new->reason}}" readonly style="text-align:center">
                                </div>
                                <div class="form-group">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success" name="submit">Approve this asset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            @endforeach
        </div>   
@endsection 