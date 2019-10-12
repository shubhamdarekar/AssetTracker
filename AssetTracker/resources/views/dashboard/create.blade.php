<?php
    use App\department;
    $ids=department::get();
?>
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}'">
    <div class="container">
        <br><br>
        <h1>Create Asset</h1>
        <form action="/home/create/store" method="POST" autocomplete="off">
            @csrf
            <div class="form-group row">
                <label class="col-3">Name Of Asset</label>
                <input type="text" class="form-control col-2" name="createAssetName">
            </div>
            <div class="form-group row">
                <label clas="col-3">Quantity</label>
                <input type="number" name="createAssetQuantity" class="form-control col-2">
            </div>
            <div class="form-group row">
                <label class="col-3">Departent</label>
                <select name="createAssetDepartment" class="col-2">
                    @foreach($ids as $id)
                        <option value="{{$id->id}}">{{$id->name}}</option>
                    @endforeach
                </select>
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