<?php
    use App\asset;
    $ids=asset::get();
?>

@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <h1>Asset Requests</h1> 
    <div class="container">
        <div class = row>
            <div class= "col-md-12">
                <br />
                <h3 style:align = "center">New Asset Requests</h3>
                <br />
                <table class="table table-bordered">
                    <tr>
                        <th>Asset Ordered</th>
                        <th>Quantity</th>
                        <th>Description</th>
                    </tr>
                    @foreach($requests as $row)
                    <tr>
                    <td>{{$row['assetOrdered']}}</td>
                    <td>{{$row['quantity']}}</td>
                    <td>{{$row['reason']}}</td>
                    </tr>
                    @endforeach
        </div>

        </div>     
        
    </div>
@endsection 