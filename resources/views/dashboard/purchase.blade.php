<?php
    use App\asset;
    $ids=asset::get();
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
    </style>
    <div style="width:inherit;height:inherit;vertical-align:middle;" align="center">
            <h1 style="text-align: center"><strong>Purchase Assets</strong></h1>
            <br><br>
            <form action="/home/purchase/index" method="POST" autocomplete="off">
                @csrf
                <div class="form-group row">
                    <label class="col-3 col-lg-offset-3">Asset Name</label>
                    <select name="purchaseDropdown" class="col-2">
                        @foreach($ids as $id)
                            <option value="{{$id->id}}">{{$id->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-lg-offset-3">Quantity</label>
                    <input type="number" name="purchaseQuantity" class="form-control col-2">
                </div>
                <div class="form-group row">
                    <label class="col-3 col-lg-offset-3">Cost</label>
                    <input type="text" class="form-control col-2" name="purchaseAmount">
                </div>
                <div class="form-group row">
                    <div class="col-4 col-lg-offset-7">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </div>
            </form>   
    </div>
@endsection 