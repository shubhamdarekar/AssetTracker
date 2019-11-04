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
        <h1 style="text-align: center"><strong>Issue an Asset</strong></h1>
        <br><br>
        <form action="/home/issue/store" method="POST" autocomplete="off">
            @csrf
            <div class="form-group row">
                <label class="col-3 col-lg-offset-3">Name of the Asset</label>
                <select name="assetDropdown" class="col-2">
                        @foreach ($ids as $id)
                            <option value="{{$id->id}}">{{$id->name}}</option>
                        @endforeach
                </select>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-3 col-lg-offset-3">Quantity</label>
                <input type="number" class="form-control col-2" name="assetQuantity" max="50" placeholder="0">
            </div>
            <div class = "row">
                <div class = "col-4 col-lg-offset-7">
                    <div class = "form-group">
                        <button type="submit" class = "btn btn-primary" name="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection