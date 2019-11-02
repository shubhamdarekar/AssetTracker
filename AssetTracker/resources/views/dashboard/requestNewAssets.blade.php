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
        <h1><strong>Request for Unavailable Asset</strong></h1>
        <br><br>
        <form action="/home/requestnewasset/newasset" method="POST" autocomplete="off">
            @csrf
            <div class="form-group row">
                <label class="col-3 col-lg-offset-3">Name of Asset</label>
                <input type="text" class="form-control col-lg-2" name="newassetname">
            </div>
            <div class="form-group row">
                    <label class="col-3 col-lg-offset-3">Description of an Asset</label>
                    <textarea type="text" class="form-control col-lg-2" name="newdescription" ></textarea>
            </div>
            <div class="form-group row">
                    <label class="col-3 col-lg-offset-3">Quantity of an Asset</label>
                    <input type="number" class="form-control col-lg-2" name="newquantity">
            </div>
            <div class="form-group row">
                    <div class="col-lg-4 col-lg-offset-7">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    {{-- <div class="container">
        
    </div> --}}
@endsection