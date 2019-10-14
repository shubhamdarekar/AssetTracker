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
        <h1>File an Issue about asset</h1>
        <form action="/home/issue/file" method="POST" autocomplete="off">
            @csrf
            <div class="form-group row">
                <label class="col-3">Name of Asset</label>
                <select name="filename" class="col-2">
                    @foreach($ids as $id)
                        <option value="{{$id->id}}">{{$id->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label clas="col-3">Issue</label>
                <input type="text" class="form-control col-2" name="fileissue">
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