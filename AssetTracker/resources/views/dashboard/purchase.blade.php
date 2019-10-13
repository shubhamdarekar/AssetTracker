<?php
    use App\asset;
    $ids=asset::get();
?>

@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <div class="container">
        <br><br>
        <h1>Purchase Assets</h1>
        <form action="/home/purchase/index" method="POST" autocomplete="off">
            @csrf
            <div class="form-group row">
                <label class="col-3">Asset Name</label>
                <select name="purchaseDropdown">
                    @foreach($ids as $id)
                        <option value="{{$id->id}}">{{$id->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label class="col-3">Quantity</label>
                <input type="number" name="purchaseQuantity" class="form-control col-3">
            </div>
            <div class="form-group row">
                <label class="col-3">Cost</label>
                <input type="text" class="form-control col-3" name="purchaseAmount">
            </div>
            <div class="form-group row">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection 