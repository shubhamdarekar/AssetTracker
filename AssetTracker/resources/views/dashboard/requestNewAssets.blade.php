<?php
    use App\asset;
    $ids=asset::get();
?>
@extends('layouts.app')
@section('content')
            <div clas="form-group row">
    <link rel="stylesheet" href="{{asset('css/app.css')}}'">
    <div class="container">
        <br><br>
        <h1>Request for New Asset</h1>
        <form action="/home/issue/file" method="POST" autocomplete="off">
            @csrf
            <div class="form-group row">
                <label clas="col-3">Name of Asset which you want to Order</label>
                <textarea type="text" class="form-control col-2" name="fileissue"></textarea>
            </div>
            <div class="form-group row">
                    <label class="col-3">Quantity of Asset</label>
                    <input type="number" class="form-control col-2" name="assetQuantity" max="50" >
            </div>
            <div class="form-group row">
                    <label class="col-3">Description</label>
                    <textarea type="text" class="form-control col-2" name="assetQuantity"></textarea>
            </div>
            <div class="form-group row">
                    <div class="col-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection