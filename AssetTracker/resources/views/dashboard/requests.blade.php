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

    .btn{
        margin-right: 2%;
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
                {{-- <a href="#" style="text-decoration: none;color:black;" class="anchor"> --}}
                    <div class="card-body">
                        <form action="/home/requests/grant" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input class="form-control" type="text" name="asset" value="{{$assetname[0]['name']}}" readonly style="text-align: center">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="quantity" value="{{$id->quantityIssued}}" readonly style="text-align:center">
                            </div>
                            <div class="form-group">
                                <div class="col-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" name="submit">Grant</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                {{-- </a>   --}}
            </div>
            <br><br>    
        @endforeach
    </div>
    
</div>
@endsection 