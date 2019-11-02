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
        <br><br>
        <h1 style="text-align: center"><strong>Edit Profile</strong></h1>
        <br><br>
        <form action="/home/edit/update" method="POST" autocomplete="off">
            @csrf
            <br>
            <div class="form-group row">
                <label class="col-3">E-mail Address</label>
                <input type="email" class="form-control col-2" name="email">
            </div>
            <div class="form-group row">
                <label class="col-3">Current Password</label>
                <input type="password" class="form-control col-2" name="currentpassword">
            </div>
            <div class="form-group row">
                <label class="col-3">New Password</label>
                <input type="password" class="form-control col-2" name="newpassword">
            </div>
            <div class = "row">
                <div class = "col-4">
                    <div class = "form-group">
                        <button type="submit" class = "btn btn-primary" name="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection