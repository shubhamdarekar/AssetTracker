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
        <h1><strong>Add New Asset</strong></h1>
        <br><br>
        <form action="/home/issue/store" method="POST" autocomplete="off">
            @csrf
            <div class="form-group row">
                <label class="col-3 col-lg-offset-3">Asset Name</label>
                <input type="text" class="form-control col-2" name="createAssetName">
            </div>
            <div class="form-group row">
                <label class="col-3 col-lg-offset-3">Quantity</label>
                <input type="number" class="form-control col-2" name="createAssetQuantity" max="50" placeholder="0">
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