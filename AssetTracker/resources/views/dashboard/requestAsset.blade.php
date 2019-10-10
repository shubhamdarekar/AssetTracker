@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        label{
            font-size: 20px;
        }
    </style>
    <div class="container">
        <br><br>
        <h1><strong>Issue Asset</strong></h1>
        <br><br>
        <form action="/assets/store" method="POST" autocomplete="off">
            @csrf
            <div class="form-group row">
                <label class="col-3">Name of the Asset</label>
                <input type="text" class="form-control col-4" name="assetName">
            </div>
            <br>
            <div class="form-group row">
                <label class="col-3">Quantity</label>
                <input type="number" class="form-control col-2" name="assetName" max="5" placeholder="0">
            </div>
            <div class = "row">
                <div class = "col-4">
                    <div class = "form-group">
                        <button type="submit" class = "btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection