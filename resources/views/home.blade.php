<?php
    use App\User;
    use App\issuedBy;
?>
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<style>
    .anchor{
        color : black;
    }
    .anchor:hover{
        text-decoration: none;
        color: black;
    }
</style>
@if (Auth::user()->role!=6)
    <div class="row" style="margin-left:4%;margin-top:3%;width:75%">
        <div class="col-lg-4 col-md-6">
            <a href="/home/userrequests" class="anchor">
                <div class="card" style="height: 100%">
                    <div class="card-body">
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text" style="font-size: 25px"><i class="fa fa-calendar-check-o" style="color: green"></i>  Assets Requested : {{count($requests)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6">
            <a href="/home/usergranted" class="anchor">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text" style="font-size: 25px"><span class="count"><i class="fa fa-calendar-check-o" style="color:blueviolet"></i>  Assets Granted : {{count($granted)}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>      
    </div>
    <div class="container" style="background-color:white;width:80%;margin-left: 2%">
        @yield('dashboard')
    </div>
    @else
    <h1>CONTACT ADMIN TO ASSIGN YOURSELF A ROLE.<br> You Wont be able to do anything before that.<br>Contact Email : adminofmysystem@gmail.com</h1>
    @endif
@endsection