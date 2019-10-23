
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}'">
    <style>
        *{
            text-decoration: none;
        }
        label{
            font-size: 20px;
        }
    </style>
    <div style="width:inherit;height:inherit;vertical-align:middle;" align="center">
        {{-- <div class="container"> --}}
            <br><br>
            <h1 style="text-align: center"><strong>Create Asset</strong></h1>
            <br><br>
            <form action="/home/create/store" method="POST" autocomplete="off">
                @csrf
                <div class="form-group row">
                    <label class="col-3">Name Of Asset</label>
                    <input type="text" class="col-3" name="createAssetName">
                </div>
                <div class="form-group row">
                    <label clas="col-3">Quantity</label>
                    <input class="col-3" type="number" name="createAssetQuantity">
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        {{-- </div> --}}
    </div>
@endsection