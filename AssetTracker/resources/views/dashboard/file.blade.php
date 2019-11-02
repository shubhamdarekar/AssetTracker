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
    <div clas="form-group row">
    <div style="width:inherit;height:inherit;vertical-align:middle;" align="center">
        <h1><strong>Report a Problem</strong></h1>
        <br><br>
        <form action="/home/issue/file" method="POST" autocomplete="off">
            @csrf
            <div class="form-group row">
                <label class="col-3 col-lg-offset-3">Name of Asset</label>
                <select name="filename" class="col-2">
                    @foreach($ids as $id)
                        <option value="{{$id->name}}">{{$id->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label class="col-3 col-lg-offset-3">Issue</label>
                <textarea type="text" class="form-control col-3" name="fileissue"></textarea>
            </div>
            <div class="form-group row">
                <div class="col-4 col-lg-offset-7">
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