<?php
    use App\User;
?>
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div style="background-color: chocolate">
    <div class="row" style="background-color: chartreuse;">
        <div class="col-4" style="background-color: black;height: 40%">
            <a href="#"><div class="card">
                <div class="card-body">
                    <i class="fa fa-wrench">  Total Assets Received</i>
                </div>
            </div></a>
        </div>
    </div>
</div>
@endsection