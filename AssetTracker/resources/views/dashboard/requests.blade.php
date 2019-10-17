<?php
    use App\asset;
    use App\User;
    ini_set ( "memory_limit" , '128M' ) ;
?>
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<style>
    *{
        text-decoration: none;
    }
    label{
        font-size: 20px;
    }

    .card-body:hover{
        background-color: aqua;
    }
</style>
<div style="width:inherit;height:inherit;vertical-align:middle" align="center">
    <br><br><br><br>
    <h1 style="text-align: center"><strong>Asset Requests</strong></h1>
    <br><br>
        @foreach ($issued as $id)
        <?php //echo var_dump($id);?>
        {{-- <h1>hello</h1> --}}
        <?php
            $itemId = $id->itemIssued;
            "<br>";
            $assetname = asset::where('id',$itemId)->get();
            //echo($assetname);
            $username = User::where('id',$id->userId)->get();
            //echo($username);
            // dd ($assetname);
        ?>
        <div class="card" style="width:40%">
            <div class="card-header" style="background-color: gray">
                <h3>{{$username[0]['name']}}</h3>
            </div>
            <a href="#" style="text-decoration: none;color:black;">
                <div class="card-body">
                    <h1>{{$assetname[0]['name']}}</h1>
                    <small>Quantity Required : {{$id->quantityIssued}}</small>
                </div>
            </a>  
            <br>  
        </div>
        <br><br>
        @endforeach
    </div>
    
</div>
@endsection 