<?php
    use App\User;
    $users=User::get()->where('role','=',6); 
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
        <h1><strong>Assign Role</strong></h1>
        <span class="border">
            <form action="/home/assignedRole" method="POST">
                @csrf
                <div class="form-group row">
                        <label class="col-3">Name of the Unassigned Users</label>
                        <select name="userDropdown" class="col-2">
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-3">Role</label>
                        <select name="roleDropdown" class="col-2">
                                <option value="0">System Admin</option>
                                <option value="1">Student</option>
                                <option value="2">Lab Assistant</option>
                                <option value="2">Peon</option>
                                <option value="3">Teacher</option>
                                <option value="4">Deputy HOD</option>
                                <option value="4">HOD</option>
                                <option value="5">Purchase Officer</option>
                        </select>
                    </div>
                    <div class = "row col-4 form-group">
                                <button type="submit" class = "btn btn-primary" name="submit">Submit</button>
                    </div>
            </form>
        </span>
    </div>
@endsection 