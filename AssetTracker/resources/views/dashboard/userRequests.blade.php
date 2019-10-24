<?php
    use App\asset;
?>

@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<style>
    h3,h5{
        text-align: center;
    }
</style>
<div class="container" align="center">
    <br><br>
    <h1>Assets Requested For </h1>
    <br>
    <table class="table">
        <tr>
            <th>No.</th>
            <th>Asset</th>
            <th>Quantity</th>
        </tr>
        @foreach($requests as $request) 
        <?php
            $asset = asset::find($request->itemIssued);
            // echo $asset;
            $id = 1;
        ?>
        <tr>
            <td>{{$id}}</td>
            <td>{{$asset['name']}}</td>
            <td >{{$request->quantityIssued}}</td>
        </tr>
        <?php
            $id = $id + 1;
        ?>
        @endforeach
    </table>
</div>
@endsection