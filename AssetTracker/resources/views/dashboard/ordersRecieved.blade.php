<?php
    use App\User;
    use App\asset;
?>
@extends('layouts.app')

@section('content')

<div style="width:inherit;height:inherit;vertical-align:middle;" align="center">
    <h1 style="text-align: center"><strong>ORDERS</strong></h1>
    <br><br>
    @foreach($orders as $order)
    <?php
        $username = User::where('id',$order->orderedBy)->get();
        $assetname = asset::where('id',$order->assetOrdered)->get();
    ?>
        <div class="card" style="width:40%">
            <div class="card-header" style="background-color: gray">
                <h3>{{$username[0]['name']}}</h3>
            </div>
            <div class="card-body">
                <form action="/home/ordersRecieved/done" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group" style="visibility:hidden">
                            <input class="form-control" type="text" name="id" value="{{$order->id}}" readonly style="text-align: center">
                        </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="asset" value="{{$assetname[0]['name']}}" readonly style="text-align: center">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="quantity" value="{{$order->quantityOrdered}}" readonly style="text-align:center">
                    </div>
                    <div class="form-group">
                        <div class="col-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" name="submit">Recieved</button>
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