<?php
    use App\User;
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('sidenav')
    <a href="/home">Dashboard</a>
    <a href="/request">Request an Asset</a>
    @if(Auth::user()->role==2 || Auth::user()->role==3)
        <a href="/requests">Asset Requests</a>
    @endif
    @if(Auth::user()->role==3 || Auth::user()->role==4 || Auth::user()->role==5)
        <a href="/fine">Fine Users</a>
    @endif
    <a href="/file">File an issue</a>
    @if(Auth::user()->role==4)
        <a href="/otherDepartmentsDetails">Other Dept. Assets</a>
    @endif
    @if(Auth::user()->role==5 || Auth::user()->role==4)
        <a href="/purchase">Place Order</a>
    @endif
    <hr style="margin-left:7.5%;width:85%">
    <a href="/edit">Edit Profile</a>
    <a href="/history">View History</a>
@endsection