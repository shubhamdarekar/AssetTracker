<?php
    use App\asset;
    $ids=asset::get();
?>
@extends('layouts.app')
@section('content')
            <div clas="form-group row">
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
        <br><br>
        <h1>Report a Problem</h1>
        <form action="/home/issue/file" method="POST" autocomplete="off">
            @csrf
            <div class="form-group row">
                <label class="col-3">Name of Asset</label>
                <select name="filename" class="col-2">
                    @foreach($ids as $id)
                        <option value="{{$id->name}}">{{$id->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label clas="col-3">Issue</label>
                <textarea type="text" class="form-control col-2" name="fileissue"></textarea>
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
    {{-- <div class="container">
        
    </div> --}}
@endsection