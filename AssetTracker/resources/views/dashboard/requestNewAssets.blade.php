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
        <form action="/home/requestnewasset/newasset" method="POST" autocomplete="off">
            @csrf
            <div class="form-group row">
                <label class="col-3">Name of Asset</label>
                <input type="text" class="form-control col-2" name="newassetname">
            </div>
            <div class="form-group row">
                    <label class="col-3">Description of an Asset</label>
                    <textarea type="text" class="form-control col-2" name="newdescription" ></textarea>
            </div>
            <div class="form-group row">
                    <label class="col-3">Quantity of an Asset</label>
                    <input type="number" class="form-control col-2" name="newquantity">
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